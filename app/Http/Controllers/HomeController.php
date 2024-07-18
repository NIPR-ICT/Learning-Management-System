<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    public function instructor(){
        return view('instructor.dashboard');
    }

    public function student(){
        return view('dashboard');
    }

    ///////////////////////////////////public /////////////////////////////////////////////////

    public function home(){
        $program = Program::latest()->get();
        return view('home', compact('program'));
    }
}
