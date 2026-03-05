<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminOnly
{
    public function handle(Request $request, Closure $next): Response
    {
        // Log portfolio access for analytics
        \Log::info('Portfolio accessed', [
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'url' => $request->fullUrl(),
            'timestamp' => now()
        ]);

        // Add custom header for portfolio pages
        $response = $next($request);
        $response->headers->set('X-Portfolio-Access', 'Granted');

        return $response;
    }
}
