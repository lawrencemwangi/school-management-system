<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckuserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $user_level):response
    {
        if (!Auth::check() || Auth::user()->user_level !== (int) $user_level) {
            abort(403, 'Unauthorized access');
        }
    
        return $next($request);
    }
    
}
