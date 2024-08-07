<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\EnrollmentTrack;
use App\Models\Part;
use App\Models\Program;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class PartController extends Controller
{

    public function index(Request $request)
    {
        $parts = Part::orderBy('accessing_order', 'desc')->paginate(10);

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
            'name' => [
    'required',
    'string',
    Rule::unique('parts')->where(function ($query) use ($request) {
        return $query->where('program_id', $request->input('program_id'));
    }),
],

            'accessing_order' => 'required||unique:parts,accessing_order',
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
            'accessing_order' => $request->get('accessing_order'),
        ]);

        $part->save();
        return redirect()->route('part.form')->with('alert', [
            'title' => 'Success!',
            'text' => 'Part created successfully.',
            'icon' => 'success'
        ]);
    }

    public function edit(string $id)
    {
        $programs = Program::all();
        $part = Part::findOrFail($id);
        return view('admin.update-part', compact('part','programs'));
    }


    public function update(Request $request, Part $part)
    {
         // Validate the request
    $request->validate([
        'program_id' => 'required|exists:programs,id',
        'name' =>'required|string',
        'description' => 'required|string',
        'max_credit' => 'required|integer',
        'min_credit' => 'required|integer',
        'program_duration' => 'required|string',
        'accessing_order'=>'required'
    ]);

    $part = Part::findOrFail($request->id);

        $part->program_id = $request->input('program_id');
        $part->name = $request->input('name');
        $part->description = $request->input('description');
        $part->max_credit = $request->input('max_credit');
        $part->min_credit = $request->input('min_credit');
        $part->program_duration = $request->input('program_duration');
        $part->accessing_order = $request->input('accessing_order');

     if($part->save()){

    return redirect()->route('all.part')->with('alert', [
        'title' => 'Success!',
        'text' => 'Part updated successfully.',
        'icon' => 'success'
    ]);
}
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

    // student functionalities
    public function studentFilterPart($programId){
        $user_id = Auth::user()->id;

        // Fetch parts ordered by accessing_order for the specified program
        $parts = Part::where('program_id', $programId)
                     ->orderBy('accessing_order', 'asc')
                     ->get();

        // Initialize variable to track if the previous part is completed
        $previousPartCompleted = true;

        foreach ($parts as $part) {
            // Check enrollment status for the part
            $enrollmentTrack = EnrollmentTrack::where('user_id', $user_id)
                                              ->where('program_id', $programId)
                                              ->where('part_id', $part->id)
                                              ->first();

            $part->is_enrolled = $enrollmentTrack ? true : false;

            // Determine if the part should be enabled or disabled
            if ($previousPartCompleted) {
                if ($part->is_enrolled) {
                    $part->disable = false; // Enable if enrolled
                } else {
                    $part->disable = false; // Enable if at least one part is enrolled
                    $previousPartCompleted = false;
                }
            } else {
                $part->disable = true; // Disable parts after the first active part
            }
        }

        return view('all-parts', compact('parts'));
    }

    public function studentFilterPartView($id){
        $parts = Part::where('program_id', $id)->paginate(10);
        $program = Program::where('id', $id)->first();
        $enrolled = Enrollment::where([['user_id', auth()->user()->id],['part_id',$id]])->first();
        return view('level', compact('parts','program','enrolled'));
    }

    public function studentPaidFilterPart($id){
        $userId = Auth::id();

        // Fetch parts related to the logged-in user and specified program_id
        $parts = Part::whereHas('enrollments', function ($query) use ($userId, $id) {
            $query->where('user_id', $userId)
                  ->where('program_id', $id);
        })->paginate(10);

        return view('student-enroll-part', compact('parts'));
    }

    // public function showParts()
    // {
    //     // Get the parts from the session
    //     $parts = session()->get('parts');
    //     return view('student-enroll-part', compact('parts'));
    // }


}
