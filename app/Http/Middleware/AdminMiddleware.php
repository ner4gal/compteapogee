<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the authenticated user exists and if their email matches the admin email.
        if ($request->user() && $request->user()->email === 'karim.elalkaoui1@uit.ac.ma') {
            return $next($request);
        }

        // Otherwise, abort with a 403 Forbidden response.
        abort(403, 'Unauthorized access.');
    }
}
