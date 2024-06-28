<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use Yajra\DataTables\DataTables;

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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'max_credit' => 'required|integer',
            'min_credit' => 'required|integer',
            'program_duration' => 'required|string',
            'short_code' => 'required|string',
        ]);

        $program = new Program([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'max_credit' => $request->get('max_credit'),
            'min_credit' => $request->get('min_credit'),
            'created_by' => auth()->id(), 
            'program_duration' => $request->get('program_duration'),
            'short_code' => $request->get('short_code'),
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
            'max_credit' => 'required|integer',
            'min_credit' => 'required|integer',
            'program_duration' => 'required|string|max:255',
            'short_code' => 'required',
        ]);

        $program = Program::findOrFail($request->id);

        // Update the program with the new data
        $program->title = $request->input('title');
        $program->description = $request->input('description');
        $program->max_credit = $request->input('max_credit');
        $program->min_credit = $request->input('min_credit');
        $program->program_duration = $request->input('program_duration');
        $program->short_code = $request->input('short_code');

        $program->save();

        return redirect()->route('program.all')->with('alert', [
            'title' => 'Success!',
            'text' => 'Program updated successfully.',
            'icon' => 'success'
        ]);
    }

    public function destroy($id)
    {
        // Find the program by ID and delete it
        $program = Program::findOrFail($id);
        $program->delete();

        // Redirect back with a success message
        return redirect()->route('program.all')->with('alert', [
            'title' => 'Deleted!',
            'text' => 'Program deleted successfully!',
            'icon' => 'success'
        ]);
    }
}
