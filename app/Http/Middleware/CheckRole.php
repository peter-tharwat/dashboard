<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,$roles)
    {

      
        if (auth()->check() && in_array(auth()->user()->power, explode('|', $roles))  ) {
            return $next($request);
        }
        abort(403);
        return redirect('login');
    }
}
