<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class GuestMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            // Redirect to a specified route if the user is authenticated
            return redirect('/Home'); 
        }

        return $next($request);
    }
}
