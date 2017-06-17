<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminAuth
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
        if(Auth::guest()) {
            return redirect()->guest('/login');
        }
        
        if(Auth::check() && Auth::user()->role != '1' && Auth::user()->role != '2' ) {
            return redirect('/');
        }

        return $next($request);
    }
}
