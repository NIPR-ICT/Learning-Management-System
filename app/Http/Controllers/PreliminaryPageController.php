<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\PreliminaryPage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PreliminaryPageController extends Controller
{
    public function index()
    {
        $preliminaries = PreliminaryPage::latest()->paginate(20);
        return view('admin.preliminary_pages.index', compact('preliminaries'));
    }


    public function create(Request $request){
        $data = $request->validate([
            'required|max:255',
            'image' => 'nullable',
            'content' => 'required'
        ]);

        $dataFromDB = PreliminaryPage::where('type',$request->type)->first();
        if($request->file('image')){
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/preliminary-page'), $filename);
            $data['image'] = $filename;
        }
        if (!empty($dataFromDB)) {
            $dataFromDB->update($data);
            $message = 'Page Content Update Successfully';
        }else{
            PreliminaryPage::create($data);
            $message = 'Page Content Created Successfully';
        }
        session()->flash('success', $message);
        return redirect()->back();
    }

    public function edit(string $id)
    {
        $page = PreliminaryPage::findOrFail($id);
        return view('admin.preliminary_pages.edit', compact('page'));
    }

    public function update(Request $request, string $id)
    {
        $page = PreliminaryPage::findOrFail($id);
        $data = $request->validate([
            'type' => 'required|max:255',
            'image' => 'nullable',
            'body' => 'required',
        ]);
        if($request->file('banner')){
            $file = $request->file('banner');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/preliminary-page'), $filename);
            $data['banner'] = $filename;
        }
        $page->update($data);
        $message = 'Page Content Updated Successfully';
        session()->flash('success', $message);
    }

    public function destroy(string $id)
    {
        PreliminaryPage::findOrFail($id)->delete();
        $message = 'Page Deleted Successfully';
        session()->flash('success', $message);
        return to_route('page.index');
    }

    public function aboutUs(){
        $aboutUs = PreliminaryPage::where('type','about')->first();
        $user = count(User::where('role','user')->get());
        $enrolled = count(DB::table('enrollments')
        ->select('user_id', 'course_id')
        ->distinct()
        ->get());
        $course = count(Course::all());
        return view('about-us', compact('aboutUs', 'user','course', 'enrolled'));
    }
}
