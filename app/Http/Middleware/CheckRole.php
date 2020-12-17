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
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!$request->user()) {
            return redirect("login");
        }
        else
        {
            foreach ($roles as $role){
                if ($request->user()->hasRole($role)){
                    
                    return $next($request);
                }}
        }
        return $next($request);
    }
}
