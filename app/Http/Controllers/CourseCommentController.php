<?php

namespace App\Http\Controllers;

use App\Models\CourseComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CourseComment $courseComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseComment $courseComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CourseComment $courseComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseComment $courseComment)
    {
        //
    }
    ///////////////////////////////////////////// public view/////////////////////////////////////
    public function courseComment(Request $request,$id){
        if (Auth::check()) {
            $exists = CourseComment::where('user_id',Auth::id())->where('course_id',$id)->first();

            if (!$exists) {
                CourseComment::insert([
                 'user_id' => Auth::id(),
                 'course_id' => $id,
                 'fullName' => $request->user_name,
                 'subject' => $request->user_subject,
                 'email' => $request->user_email,
                 'message' => $request->user_message,
             ]);
             return response()->json(['success' => 'Successfully Submited Comment']);
            }else {
             return response()->json(['error' => 'You Have Already Submitted your Comment on this Course']);
            }

         }else{
             return response()->json(['error' => 'At First Login Your Account']);
         }
    }
}
