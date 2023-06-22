<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect('/dashboard'); // Ganti dengan rute yang sesuai untuk pengguna yang sudah login
        }

        return $next($request);
    }
}
