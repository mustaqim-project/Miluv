<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Symfony\Component\HttpFoundation\Response;

class CheckLocalDNS
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ip = $request->ip();

        // Batasi request per IP dalam 60 detik
        $key = 'rate_limit_' . $ip;
        if (RateLimiter::tooManyAttempts($key, 5)) {
            return response()->view('errors.429', [], 429);
        }
        RateLimiter::hit($key, 60);

        // Gunakan API ip-api.com untuk mengecek lokasi IP
        $geoInfo = @json_decode(file_get_contents("http://ip-api.com/json/{$ip}"), true);

        if (!isset($geoInfo['countryCode']) || strtolower($geoInfo['countryCode']) !== 'id') {
            abort(404);
        }

        return $next($request);
    }
}
