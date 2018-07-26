<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AssignGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param null $guard
     * @param string $redirectTo
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null, $redirectTo = '/')
    {
        if (!Auth::guard($guard)->check()) {
            return redirect($redirectTo);
        }
        Auth::shouldUse($guard);
        return $next($request);
    }
}
