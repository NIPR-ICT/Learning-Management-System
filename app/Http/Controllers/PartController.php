<?php

namespace App\Http\Controllers;

use App\Models\Part;
use Illuminate\Http\Request;
use App\Models\Program;
use Illuminate\Validation\Rule;

class PartController extends Controller
{

    public function index(Request $request)
    {
        $parts = Part::paginate(10);

        return view('admin.all-parts', compact('parts'));
    }

    public function create(){
        $programs=Program::all();
        return view('admin.add-part', compact('programs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'program_id' => 'required',
            'name' => ['required', 'string', Rule::unique('parts')->where(function ($query) use ($request) {
                    return $query->where('program_id', $request->input('program_id'));
                }),
            ],
            'description' => 'required|string',
            'max_credit' => 'required|integer',
            'min_credit' => 'required|integer',
            'program_duration' => 'required|string',
        ]);
        

        $part = new Part([
            'program_id' => $request->get('program_id'),
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'max_credit' => $request->get('max_credit'),
            'min_credit' => $request->get('min_credit'),
            'program_duration' => $request->get('program_duration'),
        ]);

        $part->save();
        return redirect()->route('part.form')->with('alert', [
            'title' => 'Success!',
            'text' => 'Part created successfully.',
            'icon' => 'success'
        ]);
    }

    public function destroy($id)
    {
        // Find the program by ID and delete it
        $part = Part::findOrFail($id);
        $part->delete();

        return redirect()->route('all.part')->with('alert', [
            'title' => 'Deleted!',
            'text' => 'Part deleted successfully!',
            'icon' => 'success'
        ]);
    }
}
