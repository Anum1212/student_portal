<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if (Auth::user()->userType == '0') {
                return redirect()->route('superAdmin.dashboard');
            } 
            if (Auth::user()->userType == '1') {
                return redirect()->route('departmentAdmin.dashboard');
            } 
            if (Auth::user()->userType == '2') {
                return redirect()->route('societyAdmin.dashboard');
            } 
            if (Auth::user()->userType == '3') {
                return redirect()->route('student.dashboard');
            } 
        }

        return $next($request);
    }
}
