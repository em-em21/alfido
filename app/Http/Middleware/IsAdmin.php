<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
		if (Auth::user()->role === 2 || Auth::user()->role === 3) {
			return $next($request);
		}
        
		return redirect()->back()->with('unauthorised', 'You are 
          unauthorised to access this page');
    }
}
