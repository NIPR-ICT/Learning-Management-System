<?php

namespace App\Http\Controllers;

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

}
