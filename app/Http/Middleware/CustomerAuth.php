<?php

namespace App\Http\Middleware;

use Closure;

class CustomerAuth
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
        if(!auth()->check() || auth()->user()->user_type!=2)
            return redirect('/login/admin');

        //dd(auth()->user()->user_type);
        return $next($request);
    }
}
