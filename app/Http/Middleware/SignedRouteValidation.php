<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SignedRouteValidation
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
        if(!$request->hasValidSignature()){
            return redirect('/companies');
        }
        return $next($request); // if succeed, will pass to the controller
    }
}
