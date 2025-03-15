<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Http;
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
        $key = 'rate_limit_' . $ip;

        // 🔹 Batasi 60 request per 1 menit per IP
        if (RateLimiter::tooManyAttempts($key, 60)) {
            return response()->view('errors.429', [], 429);
        }
        RateLimiter::hit($key, 60);

        // 🔹 Cek lokasi IP dengan API eksternal (pakai cURL)
        $response = Http::timeout(3)->get("http://ip-api.com/json/{$ip}");

        if ($response->failed()) {
            return response()->json(['message' => 'Gagal mengambil informasi lokasi IP.'], 500);
        }

        $geoInfo = $response->json();

        // 🔹 Pastikan IP berasal dari Indonesia
        if (!isset($geoInfo['countryCode']) || strtolower($geoInfo['countryCode']) !== 'id') {
            abort(404);
        }

        return $next($request);
    }
}
