<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureBiodataUpdated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        $user = Auth::user();

       // Avoid redirect loop by checking the current route name
       if ($user && ! $user->biodata && $request->route()->getName() !== 'biodata.update') {
        return redirect()->route('biodata.update');
    }
        return $next($request);
    }
}
