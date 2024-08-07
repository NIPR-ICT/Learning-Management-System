<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Lesson;
use App\Models\Module;
use App\Models\Part;
use App\Models\Program;
use App\Models\Progress;
use App\Models\UserQuizScore;
use App\Models\Quiz;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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
        // dd($request);
            $request->validate([
                'title' => 'required|string|unique:courses,title',
                'part_id' => 'required',
                'program_id' => 'required',
                'course_category' => 'required|string',
                'course_amount' => 'required|integer',
                'course_code' => 'required|string|unique:courses,course_code',
                'cover_image' => 'required|image|mimes:jpeg,jpg,png,gif|max:2048',
                'description' => 'required|string',
                'credit_unit' => 'required|integer',
                'featured' => 'nullable|boolean',
                'standalone' => 'nullable|boolean',
            ]);


            // Create a new Course instance and populate it with validated data

            if ($request->hasFile('cover_image')) {
                $file = $request->file('cover_image');
                $timestamp = now()->timestamp;
                $title = $request->input('title');
                $fileName = Str::slug($title) . '-' . $timestamp . '.' . $file->getClientOriginalExtension();
                $filePath = $file->storeAs('covers', $fileName, 'public');
            }



            $course = new Course([
                'title' => $request->input('title'),
                'part_id' => $request->input('part_id'),
                'program_id' => $request->input('program_id'),
                'course_category' => $request->input('course_category'),
                'course_amount' => $request->input('course_amount'),
                'course_code' => $request->input('course_code'),
                'cover_image' => $filePath ?? null,
                'description' => $request->input('description'),
                'created_by' => auth()->id(),
                'credit_unit' => $request->input('credit_unit'),
                'featured' => $request->boolean('featured', false),
                'standalone' => $request->boolean('standalone', false),
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
        'featured' => 'nullable|boolean',
        'standalone' => 'nullable|boolean',
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
    $course->featured = $request->boolean('featured', false);
    $course->standalone = $request->boolean('standalone', false);
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
    Log::info('File path: ' . $course->cover_image);

        if (!empty($course->cover_image) && Storage::disk('public')->exists($course->cover_image)) {
            Storage::disk('public')->delete($course->cover_image);
        }
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
public function coursebyPartsView($id){
    $courses = Course::where('part_id', $id)->get();
    $part = Part::findOrFail($id);
    $program = Program::findOrFail($part->program_id);
    return view('program-level-course', compact('courses','part','program'));
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
    public function onboardRegister(Request $request)
    {
        // dd('got here');
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
                    $program = Program::where('id', $part->program_id)->first();
                    return view('onboard-checkout', compact('program'));
                }else if ($totalCredits < $part->min_credit) {
                    return redirect()->route('program.level.register.student', ['id' => $part->id])->with('alert', [
                        'title' => 'Error!',
                        'text' => 'Total credits are less than the minimum required credits.',
                        'icon' => 'error'
                    ]);
                }else if($totalCredits > $part->max_credit){
                    return redirect()->route('program.level.register.student', ['id' => $part->id])->with('alert', [
                        'title' => 'Error!',
                        'text' => 'Total credits are more than the maximum allowed credits.',
                        'icon' => 'error'
                    ]);
                }else{
                    return redirect()->route('program.level.register.student', ['id' => $part->id])->with('alert', [
                        'title' => 'Error!',
                        'text' => 'OOps! Course Registration Failed!',
                        'icon' => 'error'
                    ]);
                }


            }

    public function listBoughtCoursesbyUser($id){
        $userId = auth()->id();
$enrollments = Enrollment::where('user_id', $userId)
    ->where('part_id', $id)
    ->paginate(10);

foreach ($enrollments as $enrollment) {
    $courseId = $enrollment->course_id;
    $countProgress = Progress::where('course_id', $courseId)
        ->where('user_id', $userId)
        ->count();

    $totalLessons = Lesson::where('course_id', $courseId)->count();

    $completionPercentage = 0;
    if ($totalLessons > 0) {
        $completionPercentage = ($countProgress / $totalLessons) * 100;
    }

    // Add completion percentage to each enrollment
    $enrollment->completion_percentage = $completionPercentage;
}

if ($enrollments->count() > 0) {
    return view('bought-course-by-student', compact('enrollments'));
}
return redirect()->route('program.start')->with('alert', [
    'title' => 'Error!',
    'text' => 'Oops! Not Enrolled Yet',
    'icon' => 'error'
]);
    }

    public function CourseModuleDetails($id){
        $userId = auth()->id();
        $enrollCourses = Enrollment::where('user_id', $userId)
        ->where('course_id', $id)
        ->get();

    // Get the course IDs from the enrollments
    $courseIds = $enrollCourses->pluck('course_id');


    // Fetch the modules for these courses
    $modules = Module::whereIn('course_id', $courseIds)->orderBy('order', 'asc')->get();

        if($modules->count() > 0){
            $courses = Course::whereIn('id', $courseIds)->get();

            return view('bougt-course-modules', compact('modules', 'courses'));
        }else{
            return redirect()->back()->with('alert', [
                'title' => 'Error!',
                'text' => 'No Module Added yet',
                'icon' => 'error'
            ]);
        }
    }


    public function ShowBoughtCourses($id)
    {
        $userId = auth()->id();

        $module = Module::find($id);
        if (!$module) {
            return redirect()->back()->with('alert', [
                'title' => 'Error!',
                'text' => 'Ojoro will be Banned',
                'icon' => 'error'
            ]);
        }

        $courseId = $module->course_id; // Get the course_id from the module

        // Check if the user is enrolled in the course
        $isEnrolled = Enrollment::where('user_id', $userId)
            ->where('course_id', $courseId)
            ->exists();
            // Check if there's at least one record


        if (!$isEnrolled) {
            return redirect()->back()->with('alert', [
                'title' => 'Error!',
                'text' => 'Please that is Illegal Activity',
                'icon' => 'error'
            ]);
        }

        // Fetch lessons for the specified module and course
        $lessons = Lesson::where('module_id', $id)
            ->where('course_id', $courseId)
            ->orderBy('order', 'asc')
            ->get();

            $existingProgress = Progress::where('course_id', $courseId)
            ->where('module_id', $id)
            ->where('user_id', $userId)
            ->get();

            $lessonCount = Lesson::where('module_id', $id)->count();
            $module_id=$id;
            $quizData = Quiz::where('module_id', $module_id)->first();
            $preAssessmentCompleted = false;
            $postAssessmentCompleted = false;
            
            // Check if quizData exists
            if ($quizData) {
                // Fetch user progress for the quiz
                $existingProgress = UserQuizScore::where('user_id', Auth::id())
                    ->where('quiz_id', $quizData->id)
                    ->whereIn('stage', ['pre-assessment', 'post-assessment'])
                    ->get();
            
                // Check if pre-assessment and post-assessment are completed
                $preAssessmentCompleted = $existingProgress->where('stage', 'pre-assessment')->isNotEmpty();
                $postAssessmentCompleted = $existingProgress->where('stage', 'post-assessment')->isNotEmpty();
            }
            

        return view('course-list', compact('lessons','existingProgress','lessonCount','module_id','preAssessmentCompleted', 'postAssessmentCompleted'));

    }
///////////////////////////////////////////public view///////////////////////////////////////////////
    public function CourseHome(){
        $courses = Course::with('creator','modules', 'rating')->latest()->paginate(12);
        $programs = Program::with('part')->get();
        return view('course', compact('courses','programs'));
    }


    public function courseDetails($id,$slug){
    $course = Course::with('creator','review')->findOrFail($id);
    return view('course-details', compact('course'));
}

}



