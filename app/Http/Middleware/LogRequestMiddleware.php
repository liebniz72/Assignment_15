<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class LogRequestMiddleware
{
    public function handle($request, Closure $next)
    {
        // Log request method and URL
        $logMessage = 'Request: ' . $request->getMethod() . ' ' . $request->url();
        Log::info($logMessage);

        return $next($request);
    }
}

