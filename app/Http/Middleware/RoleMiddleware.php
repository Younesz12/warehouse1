<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth; // ADD THIS LINE

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Use the Auth facade to be more explicit for the linter.
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Check if the user's role matches the one passed from the route
        if (Auth::user()->role !== $role) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}