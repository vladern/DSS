<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{
    public function handle($request, Closure $next)
    {
        if($request->user()->tipo=='admin')
        {
            return $next($request);
        }else
        {   
            abort(401);
        }
        
    }
}
