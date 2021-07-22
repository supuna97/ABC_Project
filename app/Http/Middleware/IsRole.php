<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,$role)
    {

        if(! auth()->check()) {
            return redirect('login');
        }

        if (! $request->user()->hasRole($role)) {
            return redirect('login')->with('error',"you dont have permission to access");
        }
        
        return $next($request);
    }
}
