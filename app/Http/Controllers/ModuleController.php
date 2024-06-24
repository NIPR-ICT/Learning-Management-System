<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{

    public function index(Request $request)
    {
        $modules = Module::paginate(10);

        return view('admin.all-modules', compact('modules'));
    }

    public function create(){
        $courses=Course::all();
        return view('admin.add-module', compact('courses'));
    }

    public function store(Request $request)
    {
            $request->validate([
                'title' => 'required|string',
                'course_id' => 'required',
                'description' => 'required',
                'order' => 'required|numeric',
            ]);
        
            $module = new Module([
                'title' => $request->input('title'),
                'course_id' => $request->input('course_id'),
                'description' => $request->input('description'),
                'order' => $request->input('order'),
            ]);

            $module->save();
        
        return redirect()->route('add.module')->with('alert', [
            'title' => 'Success!',
            'text' => 'Module created successfully.',
            'icon' => 'success'
        ]);
        
    }

    public function editModule($id){
        $module = Module::findOrFail($id);
        $courses=Course::all();
        if($module){
            return view('admin.update-module', compact('module', 'courses')); 
        }
    }


    public function storeupdate(Request $request, Module $module){
        $request->validate([
               'title' => 'required|string',
                'course_id' => 'required',
                'description' => 'required',
                'order' => 'required|numeric',
       ]);
   
       $module = Module::findOrFail($request->id);
       $module->title = $request->input('title');
       $module->course_id = $request->input('course_id');
       $module->description = $request->input('description');
       $module->order = $request->input('order');
      
       $module->save();
       return redirect()->route('all.modules')->with('alert', [
           'title' => 'Success!',
           'text' => 'Module updated successfully.',
           'icon' => 'success'
       ]);
   }
   


public function destroy($id)
{
    $module = Module::findOrFail($id);
    $module->delete();
    return redirect()->route('all.modules')->with('alert', [
        'title' => 'Deleted!',
        'text' => 'Module deleted successfully!',
        'icon' => 'success'
    ]);
}
}
