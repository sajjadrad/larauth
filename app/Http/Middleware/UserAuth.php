<?php

namespace App\Http\Middleware;

use Closure;
use Cartalyst\Sentry\Facades\Laravel\Sentry;

class UserAuth
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
        if(!Sentry::check())
            return redirect('/login');
        return $next($request);
    }
}
