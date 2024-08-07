<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Partner;
use App\Models\Program;
use App\Models\Progress;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $totalStudents = \App\Models\User::where('role', 'student')->count();
        $totalAmount = \App\Models\Transaction::sum('amount');
        $totalCourses = \App\Models\Course::count();
        $totalPrograms = \App\Models\Program::count();
        return view('admin.dashboard', compact('totalStudents','totalAmount', 'totalCourses', 'totalPrograms'));
    }

    public function instructor(){
        return view('instructor.dashboard');
    }

    public function student(){
        $user=Auth::id();
        $totalEnrolledCourses=Enrollment::where('user_id',$user)->count();
        $totalCompletedCourses=Progress::where('user_id', $user)->count();
        $totalIncompleteCourses = $totalEnrolledCourses - $totalCompletedCourses;
        $totalEnrolledPrograms = Enrollment::where('user_id', $user)
        ->distinct('program_id')
        ->count('program_id');
        $totalparts = Enrollment::where('user_id', $user)
        ->distinct('part_id')
        ->count('part_id');
        return view('dashboard', compact('totalEnrolledCourses', 'totalCompletedCourses', 'totalIncompleteCourses', 'totalEnrolledPrograms', 'totalparts'));
    }

    ///////////////////////////////////public /////////////////////////////////////////////////

    public function home(){
        $program = Program::latest()->get();
        $students = User::where('role','student')->count();
        $users = User::count();
        $allCourse = Course::count();
        $trendingInstructor = User::with('course')->where('role', 'instructor')->get();
        $courses = Course::with(['modules', 'creator', 'lessons', 'program','rating'])
        ->where('standalone', 1)
        ->latest()
        ->take(6)
        ->get();
        $partners = Partner::latest()->take(12)->get();
        $blog = Blog::with('category')->latest()->take(12)->get();
        $enrolledStudent = Enrollment::distinct('user_id')->count('user_id');
        $reviewRating = (Review::sum('rating'))/((Review::count() >=1 )?  Review::count() : 1 );
        $reviewCount = Review::count();

        $mostEnrolledCourses = DB::table('enrollments')
        ->select('course_id', DB::raw('COUNT(*) AS cnt'))
        ->groupBy('course_id')
        ->orderByRaw('COUNT(*) DESC')
        ->take(10)
        ->get();
        return view('home', compact('users',
        'reviewRating','reviewCount',
        'program','enrolledStudent',
        'allCourse','students', 
        'courses','mostEnrolledCourses',
        'trendingInstructor', 'partners',
         'blog'
        ));
    }


}
