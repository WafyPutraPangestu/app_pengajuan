<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ChekUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check() && Auth::user()->role === 'user') {
            return $next($request);
        }

        if (Auth::user()->role !== 'user') {
            abort(403, 'You are not authorized to access this page');
        }
        
        
        return redirect()->route('auth.login')->with('error', 'You are not authorized to access this page');
    }
}
