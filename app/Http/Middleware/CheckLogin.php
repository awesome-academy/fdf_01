<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
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
        if(auth()->check())
        {
            if (auth()->user()->role == config('setting.user'))
            {

                return $next($request);
            }
        }
        
        return redirect()->route('login.index');
    }
}
