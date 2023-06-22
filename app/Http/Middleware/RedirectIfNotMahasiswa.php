<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotMahasiswa
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || Auth::user()->level !== 'mahasiswa') {
            return redirect('/login');
        }

        return $next($request);
    }
}
