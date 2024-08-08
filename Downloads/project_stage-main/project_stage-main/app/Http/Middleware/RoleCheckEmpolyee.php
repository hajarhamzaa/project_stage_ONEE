<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleCheckEmpolyee
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
        foreach (auth()->user()->roles as $role ) {
            if ($role->name!=='Empolyee') {
                abort(403,'Only the empolyee can use this pages like this');
             };
        }
        return $next($request);
    }
}
