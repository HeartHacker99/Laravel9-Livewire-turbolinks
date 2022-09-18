<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Checkrole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  String $role
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, String $role)
    {
        if($role == 'admin' && auth()->user()->roles != 1)
        {
            abort(403);
        }
        if($role == 'client' && auth()->user()->roles != 0)
        {
            abort(403);
        }
        return $next($request);
    }
}
