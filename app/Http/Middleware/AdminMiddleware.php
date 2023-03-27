<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(isset(auth()->user()->role) && auth()->user()->role == 0){
            return $next($request);
        }
        return redirect('/')->with('loginerror',"Access Denied! You don't have permission to access this panel.");
    }
}
