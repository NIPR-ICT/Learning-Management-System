<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BiodataController extends Controller
{
    public function create(){
        return view('bioupdate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date_of_birth' => ['required', 'date', 'before_or_equal:' . Carbon::now()->subYears(18)->toDateString()],
            'gender' => 'required|string',
            'nationality' => 'required|string',
            'marital_status' => 'required|string',
            'phone_number' => 'required',
            'state' => 'required|string',
            'address' => 'required|string',
            'highest_qualification' => 'required|string',
            'major_field_of_study' => 'required|string',
            'practice_no' => [
                Rule::unique('biodata', 'practice_no')
            ],
        ]);
        $biodata = new Biodata([
            'date_of_birth' => $request->get('date_of_birth'),
            'gender' => $request->get('gender'),
            'nationality' => $request->get('nationality'),
            'marital_status' => $request->get('marital_status'),
            'user_id' => auth()->id(),
            'phone_number' => $request->get('phone_number'),
            'state' => $request->get('state'),
            'address' => $request->get('address'),
            'highest_qualification' => $request->get('highest_qualification'),
            'major_field_of_study' => $request->get('major_field_of_study'),
            'practice_no' => $request->get('practice_no'),
        ]);

        $biodata->save();
        return redirect()->route('dashboard')->with('alert', [
            'title' => 'Success!',
            'text' => 'biodata Updated successfully.',
            'icon' => 'success'
        ]);
    }
    ////////////////////////////////// student dash////////////////////////////////

    public function profilePicture(Request $request){
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $timestamp = now()->timestamp;
            $fileName = $timestamp . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('profile', $fileName, 'public');
            $user = auth()->user()->id;  
            $userImage = User::find($user);
            $userImage->image = $filePath;
            $userImage->save();
            return redirect()->back();
        }else {
        //  return response()->json(['error' => 'an error occured, Please try again later ):'.$request->all()]);
         return response()->json(['error' => $request->profillePicture]);
        }

    }
}
