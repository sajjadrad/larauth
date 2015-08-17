<?php

namespace App\Http\Middleware;

use Closure;
use Cartalyst\Sentry\Facades\Laravel\Sentry;

class PageConfig
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
        $currentUser = null;
        if(Sentry::check())
        {
            $tempUser = Sentry::getUser();
            $currentUser = array(
                                "id"            =>  $tempUser->id,
                                "firstname"     =>  $tempUser->first_name,
                                "fullname"      =>  $tempUser->first_name . " " . $tempUser->last_name
                                );

        }
        view()->share('currentUser',$currentUser);
        return $next($request);
    }
}
