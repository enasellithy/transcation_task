<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends  Middleware
{
    public function handle($request, \Closure $next, ...$guards)
    {
        if (Auth::check()) {
            return $next($request);
        }
        return redirect(aurl('login'));
    }

}
