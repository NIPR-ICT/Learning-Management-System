<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PharIo\Manifest\Url;

class MaterialController extends Controller
{
    public function index(Request $request)
    {
        $materials = Material::paginate(10);

        return view('admin.all-materials', compact('materials'));
    }

    public function create($id){
        $lesson=Lesson::findOrFail($id);
        if($lesson){
            return view('admin.add-material', compact('lesson'));
        }
    }

    public function store(Request $request)
    {
         $request->validate([
           'title' => 'required|string|max:255|unique:materials,title',
            'type' => 'required|string|in:Document,Video,Audio',
            'file_path' => 'required|file|mimes:pdf,doc,docx,mp4,mp3',
            'description' => 'nullable|string',
            'lesson_id' => 'required|exists:lessons,id',
            'course_id' => 'required|exists:courses,id',
        ]);

      
        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $timestamp = now()->timestamp;
            $title = $request->input('title');
            $fileName = Str::slug($title) . '-' . $timestamp . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('materials', $fileName, 'public');
        }
        
        $material = new Material([
            'course_id' => $request->input('course_id'),
            'lesson_id' => $request->input('lesson_id'),
            'type' => $request->input('type'),
            'file_path' => $filePath ?? null,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);
    
        $material->save();
    
        return redirect()->route('all.modules.lesson')->with('alert', [
            'title' => 'Success!',
            'text' => 'Material added successfully.',
            'icon' => 'success'
        ]);
    }


    public function download($id)
    {
        $material = Material::findOrFail($id);
    
        if (Storage::disk('public')->exists($material->file_path)) {
            return Storage::disk('public')->download($material->file_path, $material->title);
        } else {
            return redirect()->back()->withErrors(['error' => 'File not found']);
        }
    }
   

}
