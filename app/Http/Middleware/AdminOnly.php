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

        // Simple restriction rule for demo/audit purposes.
        // Visiting any portfolio route with ?blocked=1 returns a custom message.
        if ($request->query('blocked') === '1') {
            return response('Portfolio access blocked by middleware policy.', 403);
        }

        // Add custom header for portfolio pages
        $response = $next($request);
        $response->headers->set('X-Portfolio-Access', 'Granted');

        return $response;
    }
}
