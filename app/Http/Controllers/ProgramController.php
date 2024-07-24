<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;
use App\Models\Program;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $programs = Program::paginate(10);

        return view('admin.all-programs', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.add-program');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:programs,title',
            'description' => 'required|string',
            'short_code' => 'required|string',
            'cover_image' => 'required|image|mimes:jpeg,jpg,png,gif|max:2048',
            'accessing_order' => 'required',
        ]);

        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $timestamp = now()->timestamp;
            $title = $request->input('title');
            $fileName = Str::slug($title) . '-' . $timestamp . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('covers', $fileName, 'public');
        }
        // dd('got here');
        $program = new Program([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'slug' => Str::slug($title),
            'created_by' => auth()->id(),
            'short_code' => $request->get('short_code'),
            'accessing_order' => $request->get('accessing_order'),
            'cover_image' => $filePath ?? null,
        ]);

        $program->save();
        return redirect()->route('program.create')->with('alert', [
            'title' => 'Success!',
            'text' => 'Program created successfully.',
            'icon' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $program = Program::findOrFail($id); // Fetch program by ID
        return view('admin.update-program', compact('program')); // Pass program data to view
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Program $program)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'short_code' => 'required',
            'accessing_order' => 'required',
        ]);
// hh
        $program = Program::findOrFail($request->id);

        // Update the program with the new data
        $program->title = $request->input('title');
        $program->description = $request->input('description');
        $program->short_code = $request->input('short_code');
        $program->accessing_order = $request->input('accessing_order');

        $program->save();

        return redirect()->route('program.all')->with('alert', [
            'title' => 'Success!',
            'text' => 'Program updated successfully.',
            'icon' => 'success'
        ]);
    }

    public function destroy($id)
    {
        $program = Program::findOrFail($id);
        Log::info('File path: ' . $program->cover_image);

        if (!empty($program->cover_image) && Storage::disk('public')->exists($program->cover_image)) {
            Storage::disk('public')->delete($program->cover_image);
        }

        $program->delete();

        // Redirect back with a success message
        return redirect()->route('program.all')->with('alert', [
            'title' => 'Deleted!',
            'text' => 'Program deleted successfully!',
            'icon' => 'success'
        ]);
    }

    // Student Functionalities
    public function studentGetProgram(){
        $user_id = Auth::user()->id;
        $programs = Program::paginate(10);
        foreach ($programs as $program) {
            $enrollment = Enrollment::where('user_id', $user_id)
                                    ->where('program_id', $program->id)
                                    ->first();

            $program->is_enrolled = $enrollment ? true : false;
        }
        return view('all-programs', compact('programs'));
    }

    public function studentBoughtCourses(){
        $user_id = Auth::user()->id;

        $programs = Program::whereHas('enrollments', function($query) use ($user_id) {
        $query->where('user_id', $user_id);})->paginate(10);

        return view('student-bought-program', compact('programs'));
    }
    //////////////////////////////// public view////////////////////////////////////////////////

    public function programReg($id){
        $program = Program::findOrFail($id);
        return view('program', compact('program'));
    }
}
