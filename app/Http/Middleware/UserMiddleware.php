<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated
        if (!auth()->check()) {
            return redirect()->route('user.login')->with('error', 'Please login to access this area.');
        }

        // Check if user is NOT admin (i.e., regular user)
        if (auth()->user()->isAdmin()) {
            // Redirect admin to admin dashboard
            return redirect()->route('admin.dashboard')->with('error', 'Admins should use the admin portal.');
        }

        return $next($request);
    }
}
