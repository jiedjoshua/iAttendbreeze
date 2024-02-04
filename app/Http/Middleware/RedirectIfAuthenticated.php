<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\User; 

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            // Use the getDashboardUrl method from the User model
            return redirect(Auth::user()->getDashboardUrl());
        }

        return $next($request);
    }
}