<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class typeStudent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user() && $request->user()->userType == '3')
        return $next($request);
        else
        return redirect('/login');
    }
}
