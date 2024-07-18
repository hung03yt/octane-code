<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                return $next($request);
            } else {
                // User is authenticated but not an admin
                return redirect()->route('login')->with('error', 'You do not have admin access.');
            }
        } else {
            // User is not authenticated
            return redirect()->route('login')->with('error', 'Please log in to access this page.');
        }
    }
}
