<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
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
        $module=Module::findOrFail($id);;
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
    
}