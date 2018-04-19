<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
		if(! auth()->check())
			return redirect('/login');
			
		if(auth()->user()->rol_id != 1) //not admin
			return redirect('/tickets');
			
        return $next($request);
    }
}
