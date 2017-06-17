<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AuthActive
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

        if(Auth::check() && Auth::user()->validated != "1" ) {
            return redirect()->guest('/validate');
        }
        return $next($request);
    }
}
