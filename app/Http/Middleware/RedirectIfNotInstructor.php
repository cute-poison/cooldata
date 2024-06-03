<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectIfNotInstructor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated and is an instructor
        if ($request->user() && $request->user()->role == 'instructor') {
            return $next($request);
        }

        // If not an instructor, redirect to home page or login page
        return redirect('/');
    }
}
