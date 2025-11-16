<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class RedirectVendorGuests extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (! $request->expectsJson()) {
            // !!! IMPORTANT: Set this to the actual URI path of your vendor login page.
            return '/vendor-sign-in'; // <-- Change this URI to your manual login path
        }
        return null;
    }
}