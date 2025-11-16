<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class EnsureVendor
{
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated AND has vendor role
        if (Auth::check() && Auth::user()->role === 'vendor') {
            return $next($request);
        }

        // If not vendor, redirect to login or show error
        return redirect('/vendor/login')->with('error', 'Access denied. Vendor account required.');
    }
}