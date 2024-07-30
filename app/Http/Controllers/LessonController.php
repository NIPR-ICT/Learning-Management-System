<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Lesson;
use App\Models\Material;
use App\Models\Module;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index(Request $request)
    {
        $modules = Module::paginate(10);

        return view('admin.view-modules', compact('modules'));
    }

    public function create($id){
        $module=Module::findOrFail($id);
        return view('admin.add-lesson', compact('module'));
    }

    public function store(Request $request)
{
     $request->validate([
        'title' => 'required|string',
        'module_id' => 'required',
        'course_id' => 'required',
        'content' => 'required',
        'order' => 'required|integer',
    ]);

    $lesson = new Lesson([
        'title' => $request->input('title'),
        'module_id' => $request->input('module_id'),
        'course_id' => $request->input('course_id'),
        'content' => $request->input('content'),
        'order' => $request->input('order'),
    ]);

    $lesson->save();

    return redirect()->route('all.modules.lesson')->with('alert', [
        'title' => 'Success!',
        'text' => 'Lesson added successfully.',
        'icon' => 'success'
    ]);
}


public function destroy($id)
{
    $lesson = Lesson::findOrFail($id);
    $lesson->delete();
    return redirect()->route('all.modules.lesson')->with('alert', [
        'title' => 'Deleted!',
        'text' => 'Lesson deleted successfully!',
        'icon' => 'success'
    ]);
}


public function showCoures($id){
    $lessons = Lesson::where('module_id', $id)->paginate(10);
    return view('admin.course-module', compact('lessons'));
}
    


public function edit($id)
    {
        $lesson = Lesson::findOrFail($id); // Fetch program by ID
        return view('admin.update-lesson', compact('lesson')); // Pass program data to view
    }


    public function update(Request $request, Lesson $lesson)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string',
            'module_id' => 'required',
            'course_id' => 'required',
            'content' => 'required',
            'order' => 'required|integer',
        ]);

        $lesson = Lesson::findOrFail($request->id);

        // Update the program with the new data
        $lesson->title = $request->input('title');
        $lesson->module_id = $request->input('module_id');
        $lesson->course_id = $request->input('course_id');
        $lesson->content = $request->input('content');
        $lesson->order = $request->input('order');

        $lesson->save();

        return redirect()->route('all.modules.lesson')->with('alert', [
            'title' => 'Success!',
            'text' => 'Lesson updated successfully.',
            'icon' => 'success'
        ]);
    }

    function lessDetails($id){
        $userId = auth()->id();
        $lesson = Lesson::find($id);
        if (!$lesson) {
            return redirect()->back()->with('alert', [
                'title' => 'Error!',
                'text' => 'Ojoro will be Banned',
                'icon' => 'error'
            ]);
        }
        
        $moduleID = $lesson->module_id;
        $courseID = $lesson->course_id; 
        $content = $lesson->content;
        $title = $lesson->title;
        $lessonId = $lesson->id;
        $materials=Material::where('course_id', $courseID)
                            ->where('lesson_id', $lessonId)
                            ->get();
        
        $part=Course::where('id', $courseID)->first();
        $partID=$part->part_id;
        // Check if the user is enrolled in the course
        $isEnrolled = Enrollment::where('user_id', $userId)
            ->where('course_id', $courseID)
            ->exists(); // Check if there's at least one record
        
        if (!$isEnrolled) {
            return redirect()->back()->with('alert', [
                'title' => 'Error!',
                'text' => 'Please that is Illegal Activity',
                'icon' => 'error'
            ]);
        }
        
        // Fetch lessons for the specified module and course
        $lessons = Lesson::where('module_id', $moduleID)
            ->where('course_id', $courseID)
            ->orderBy('order', 'asc')
            ->get();
        
        // Find the index of the current lesson
        $currentIndex = $lessons->search(function ($item, $key) use ($lesson) {
            return $item->id == $lesson->id;
        });
        
        // Determine the previous and next lessons
        $previousLesson = $currentIndex > 0 ? $lessons[$currentIndex - 1] : null;
        $nextLesson = $currentIndex < $lessons->count() - 1 ? $lessons[$currentIndex + 1] : null;
        
        return view('lesson-detail', compact('lessons', 'lesson', 'content', 'title', 'previousLesson', 'nextLesson','partID','materials'));        
    }

}
