<?php

namespace App\Http\Controllers;

use App\Models\ExtraCharge;
use App\Models\Part;
use App\Models\Program;
use Illuminate\Http\Request;

class ChargesController extends Controller
{

    public function index(Request $request)
    {
        $charges = ExtraCharge::paginate(10);

        return view('admin.all-charges', compact('charges'));
    }

    public function create(){
        $parts=Part::all();
        return view('admin.add-charge',compact('parts'));
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'item' => 'required|string|max:255',
            'part_id' => 'required|exists:parts,id',
            'program_id' => 'required|exists:programs,id',
            'amount' => 'required|numeric|min:10',
            'description' => 'nullable|string',
            'item' => [
                'required',
                'string',
                'max:255',
                function ($attribute, $value, $fail) use ($request) {
                    if (ExtraCharge::where('item', $value)
                        ->where('part_id', $request->part_id)
                        ->where('program_id', $request->program_id)
                        ->exists()) {
                        $fail('The charge with this item, program, and part already exists.');
                    }
                },
            ],
        ]);

        // Create a new charge
        $charge = new ExtraCharge([
            'item' => $request->input('item'),
            'part_id' => $request->input('part_id'),
            'program_id' => $request->input('program_id'),
            'amount' => $request->input('amount'),
            'description' => $request->input('description'),
        ]);
    
        if($charge->save()){
            return redirect()->route('all.charges')->with('alert', [
                'title' => 'Success!',
                'text' => 'Charges added successfully.',
                'icon' => 'success'
            ]);
        };
       
    }


    public function destroy($id)
    {
        $charge = ExtraCharge::findOrFail($id);
        if($charge->delete()){
        return redirect()->route('all.charges')->with('alert', [
            'title' => 'Deleted!',
            'text' => 'Charge deleted successfully!',
            'icon' => 'success'
        ]);

        }

    }

    public function edit(ExtraCharge $charge)
    {
        $parts = Part::with('program')->get();
        $programs = Program::all();
        return view('admin.update-charges', compact('charge', 'parts', 'programs'));
    }

    public function update(Request $request, ExtraCharge $charge) {
        $request->validate([
            'item' => [
                'required',
                'string',
                'max:255',
                function ($attribute, $value, $fail) use ($request, $charge) {
                    if (ExtraCharge::where('item', $value)
                        ->where('part_id', $request->part_id)
                        ->where('program_id', $request->program_id)
                        ->where('amount', $request->amount)
                        ->where('id', '!=', $charge->id)
                        ->exists()) {
                        $fail('The charge with this item, program, amount and part already exists.');
                    }
                },
            ],
            'part_id' => 'required|exists:parts,id',
            'program_id' => 'required|exists:programs,id',
            'amount' => 'required|numeric|min:10',
            'description' => 'nullable|string',
        ]);
    
        $charge->item = $request->input('item');
        $charge->part_id = $request->input('part_id');
        $charge->program_id = $request->input('program_id');
        $charge->amount = $request->input('amount');
        $charge->description = $request->input('description');
    
        if ($charge->save()) {
            return redirect()->route('all.charges')->with('alert', [
                'title' => 'Success!',
                'text' => 'Charge updated successfully.',
                'icon' => 'success'
            ]);
        }

    }
    
}

