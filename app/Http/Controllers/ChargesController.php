<?php

namespace App\Http\Controllers;

use App\Models\ExtraCharge;
use App\Models\Part;
use Illuminate\Http\Request;

class ChargesController extends Controller
{
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
    
        $charge->save();
    
        return redirect()->route('charge.form')->with('alert', [
            'title' => 'Success!',
            'text' => 'Charges added successfully.',
            'icon' => 'success'
        ]);
    }
}

