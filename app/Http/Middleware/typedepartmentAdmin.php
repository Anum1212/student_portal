<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class typedepartmentAdmin
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
        if ($request->user() && $request->user()->userType == '1')
        return $next($request);
        else
        return redirect('/login');
    }
}
