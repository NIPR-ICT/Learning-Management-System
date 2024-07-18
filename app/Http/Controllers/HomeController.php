<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Partner;
use App\Models\Program;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $trendingInstructor = User::with('course')->where('role', 'instructor')->get();
        $courses = Course::with('modules','creator','lessons','program')->latest()->get();
        $partners = Partner::latest()->take(12)->get();
        $blog = Blog::with('category')->latest()->take(12)->get();
        $mostEnrolledCourses = DB::table('enrollments')
        ->select('course_id', DB::raw('COUNT(*) AS cnt'))
        ->groupBy('course_id')
        ->orderByRaw('COUNT(*) DESC')
        ->take(10)
        ->get();
        return view('home', compact('program', 'courses','mostEnrolledCourses','trendingInstructor', 'partners', 'blog'));
    }
}
