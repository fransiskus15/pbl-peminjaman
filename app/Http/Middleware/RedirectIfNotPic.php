<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotPic
{
    public function handle(Request $request, Closure $next, ...$levels)
    {
        $user = Auth::user();
        if (!in_array($user->level, $levels) && $user->level !== 'pic') {
            dd(Auth::user());
        return redirect('/login');
        }
        return $next($request);
    }
}
