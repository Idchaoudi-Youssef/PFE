<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is not an admin
        if (Auth::user()->utype != 'ADM') {
            // Flush session and redirect to login page if user is not an admin
            session()->flush();
            return redirect()->route('login');
        }

        // Proceed with the request for admin users
        return $next($request);
    }
}
