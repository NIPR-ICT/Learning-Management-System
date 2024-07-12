<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Part;
use App\Models\Program;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CourseController extends Controller
{

    public function index(Request $request)
    {
        $courses = Course::paginate(10);

        return view('admin.all-courses', compact('courses'));
    }

    public function create(){
        $programs=Program::all();
        $parts=Part::all();
        return view('admin.add-course', compact('programs','parts'));
    }

    public function store(Request $request)
    {
            $request->validate([
                'title' => 'required|string|unique:courses,title',
                'part_id' => 'required',
                'program_id' => 'required',
                'course_category' => 'required|string',
                'course_amount' => 'required|integer',
                'course_code' => 'required|string|unique:courses,course_code',
                'description' => 'required|string',
                'credit_unit' => 'required|integer',
            ]);
        
            // Create a new Course instance and populate it with validated data
            $course = new Course([
                'title' => $request->input('title'),
                'part_id' => $request->input('part_id'),
                'program_id' => $request->input('program_id'),
                'course_category' => $request->input('course_category'),
                'course_amount' => $request->input('course_amount'),
                'course_code' => $request->input('course_code'),
                'description' => $request->input('description'),
                'created_by' => auth()->id(),
                'credit_unit' => $request->input('credit_unit'),
            ]);

            $course->save();
        
        return redirect()->route('course.form')->with('alert', [
            'title' => 'Success!',
            'text' => 'Course created successfully.',
            'icon' => 'success'
        ]);
        
    }

    public function courseDetail($id){
        $course = Course::with('creator')->findOrFail($id);
        return view('admin.course-detail', compact('course')); 
    
}

public function editCourse($id){
    $course = Course::with('creator')->findOrFail($id);
    $parts=Part::all();
    if($course){
        return view('admin.update-course', compact('course', 'parts')); 
    }
}

public function storeupdate(Request $request, Course $course){
     $request->validate([
        'title' => 'required|string|max:255',
        'part_id' => 'required|exists:parts,id',
        'program_id' => 'required|exists:programs,id',
        'course_category' => 'required|string|in:Core,Elective,General',
        'course_amount' => 'required|numeric|min:0',
        'course_code' => 'required|string|max:255',
        'description' => 'nullable|string',
        'credit_unit' => 'required|integer',
    ]);

    $course = Course::findOrFail($request->id);
    $course->title = $request->input('title');
    $course->part_id = $request->input('part_id');
    $course->program_id = $request->input('program_id');
    $course->course_category = $request->input('course_category');
    $course->course_amount = $request->input('course_amount');
    $course->course_code = $request->input('course_code');
    $course->description = $request->input('description');
    $course->credit_unit = $request->input('credit_unit');
    $course->save();
    return redirect()->route('all.courses')->with('alert', [
        'title' => 'Success!',
        'text' => 'Course updated successfully.',
        'icon' => 'success'
    ]);
}

public function destroy($id)
{
    $course = Course::findOrFail($id);
    $course->delete();
    return redirect()->route('all.courses')->with('alert', [
        'title' => 'Deleted!',
        'text' => 'Course deleted successfully!',
        'icon' => 'success'
    ]);
}

// student functionalities

public function coursebyParts($id){
    $courses = Course::where('part_id', $id)->get();
    $part=$part = Part::findOrFail($id);
    return view('register-courses', compact('courses','part'));
}

public function register(Request $request)
    {
                $validated = $request->validate([
                    'part_id' => 'required|exists:parts,id',
                    'courses' => 'required|array',
                    'courses.*' => 'exists:courses,id', 
                ]);
        
                $user = auth()->user();
        
                $part = Part::findOrFail($validated['part_id']);
    
                $selectedCourses = Course::whereIn('id', $validated['courses'])->get(['id', 'title', 'credit_unit', 'course_amount']);
                $totalAmount = $selectedCourses->sum('course_amount');
                $totalCredits = $selectedCourses->sum('credit_unit');

                if($totalCredits == $part->max_credit || ($totalCredits >= $part->min_credit && $totalCredits <= $part->max_credit)){
                    session([
                        'totalAmount' => $totalAmount,
                        'part' => $part,
                        'selectedCourses' => $selectedCourses
                    ]);
                    return redirect()->route('register.checkout.summary');
                }else if ($totalCredits < $part->min_credit) {
                    return redirect()->route('course.register.student', ['id' => $part->id])->with('alert', [
                        'title' => 'Error!',
                        'text' => 'Total credits are less than the minimum required credits.',
                        'icon' => 'error'
                    ]);
                }else if($totalCredits > $part->max_credit){
                    return redirect()->route('course.register.student', ['id' => $part->id])->with('alert', [
                        'title' => 'Error!',
                        'text' => 'Total credits are more than the maximum allowed credits.',
                        'icon' => 'error'
                    ]);
                }else{
                    return redirect()->route('course.register.student', ['id' => $part->id])->with('alert', [
                        'title' => 'Error!',
                        'text' => 'OOps! Course Registration Failed!',
                        'icon' => 'error'
                    ]);
                }
        
   
            }

    public function listBoughtCoursesbyUser(Request $request){
        $user = auth()->user();
        $partId = $request->input('part_id');

        if ($user && $partId) {
            // Fetch enrollments with nested relationships
            $enrollments = $user->enrollments()->where('part_id', $partId)
                ->with(['course' => function ($query) {
                    $query->orderBy('order', 'asc');
                }])
                ->with(['course.modules' => function ($query) {
                    $query->orderBy('order', 'asc'); 
                }])
                ->with(['course.modules.lessons' => function ($query) {
                    $query->orderBy('order', 'asc'); 
                }])
                ->with('course.modules.lessons.materials') 
                ->paginate(10);
                session()->put('enrollments', $enrollments);
                return redirect()->route('enrollment.index');
        }

        return redirect()->route('program.start')->with('alert', [
            'title' => 'Error!',
            'text' => 'Not Enrolled Yet',
            'icon' => 'error'
        ]);
    }

    public function enrollmentbyStudent()
    {
        $enrollments = session()->get('enrollments');

        return view('bought-course-by-student', compact('enrollments'));
    }

}

