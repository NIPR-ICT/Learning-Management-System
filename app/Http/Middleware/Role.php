<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // $user = Auth::user();

        // if ($user->role !== $role) {
        //     if ($user->role === 'admin') {
        //         return redirect()->route('admin.dashboard');
        //     } elseif ($user->role === 'instructor') {
        //         return redirect()->route('instructor.dashboard');
        //     } else {
        //         return redirect()->route('unauthorized');
        //     }
        // }
        // $user = Auth::user();

        // if ($user->role !== $role) {
        //     Auth::logout();
        //     return redirect()->route('login')->with('error', 'Unauthorized access. You have been logged out.');
        // }

        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in.');
        }

        if ($user->role !== $role) {
            Auth::logout();
            return redirect()->route('login')->with('error', 'Unauthorized access. You have been logged out.');
        }
        return $next($request);
    }
}
