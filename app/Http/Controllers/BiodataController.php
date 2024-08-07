<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class BiodataController extends Controller
{
    public function create(){
        return view('bioupdate');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'date_of_birth' => ['required', 'date', 'before_or_equal:' . Carbon::now()->subYears(18)->toDateString()],
            'gender' => 'required|string',
            'nationality' => 'required|string',
            'marital_status' => 'required|string',
            'phone_number' => 'required',
            'state' => 'required|string',
            'address' => 'required|string',
            'highest_qualification' => 'required|string',
            'major_field_of_study' => 'required|string',
            'bio' => 'required|string',
            'practice_no' => [
                Rule::unique('biodata', 'practice_no')
            ],
        ]);
        $bioExist = Biodata::where('user_id', auth()->user()->id)->first();
        if(empty($bioExist)){

            $user = User::findOrFail(auth()->user()->id);
            $user->name = $request->name;
            $user->save();

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
            'bio' => $request->bio,
        ]);

        $biodata->save();
        return redirect()->route('student.setting')->with('alert', [
            'title' => 'Success!',
            'text' => 'Biodata Created successfully.',
            'icon' => 'success'
        ]);
    }else{

        Biodata::findOrFail($bioExist->id)->update($data);
        return redirect()->route('student.setting')->with('alert', [
            'title' => 'Success!',
            'text' => 'Biodata Updated successfully.',
            'icon' => 'success'
        ]);
    }
    }
    public function passwordReset(Request $request){
        $data = $request->validate([
        'password' => ['required',  Rules\Password::defaults()],
        'current_password' => 'required',
        'password_confirm' => 'required'
        ]);
        $user = User::findOrFail(auth()->user()->id);
        // dd($user->password.'-'.$request->current_password);
        if (Hash::check($request->current_password, $user->password)) {
    // Success
        if($request->password === $request->password_confirm){
            $user->password =  Hash::make($request->password);
            $user->save();
            $notification = array(
                'message' => 'Password Updated successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('student.setting')->with($notification);
        }else{
            $notification = array(
                'message' => 'Password and Re-type Password do not match.Please Try Again :(',
                'alert-type' => 'error'
            );
            return redirect()->route('student.setting')->with($notification);
        }
        }else{
            $notification = array(
                'message' => 'Current Password Do not Match our Records',
                'alert-type' => 'error'
            );
            return redirect()->route('student.setting')->with($notification);
        }

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
            $notification = array(
                'message' => 'Profile Picture Updated Successfully',
                'alert-type' => 'success'
            ); 
            return redirect()->route('student.setting')->with($notification);
        }else {
            $notification = array(
                'message' => 'Choose an Image File to Update Profile Picture',
                'alert-type' => 'error'
            );
            return redirect()->route('student.setting')->with($notification);

        //  return response()->json(['error' => 'an error occured, Please try again later ):'.$request->all()]);
        //  return response()->json(['error' => $request->profillePicture]);
        }

    }
}
