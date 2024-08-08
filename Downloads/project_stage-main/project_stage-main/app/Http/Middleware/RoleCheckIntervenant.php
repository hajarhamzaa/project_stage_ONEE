<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleCheckIntervenant
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
            if ($role->name!=='Intervenant') {
                abort(403,'Only the intervenant can use this pages like this');
             };
        }

        return $next($request);
    }
}
