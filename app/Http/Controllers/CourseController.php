<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Part;
use App\Models\Program;
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
    ]);

    $course = Course::findOrFail($request->id);
    $course->title = $request->input('title');
    $course->part_id = $request->input('part_id');
    $course->program_id = $request->input('program_id');
    $course->course_category = $request->input('course_category');
    $course->course_amount = $request->input('course_amount');
    $course->course_code = $request->input('course_code');
    $course->description = $request->input('description');
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
}

