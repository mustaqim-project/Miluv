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
     * Daftar domain yang diizinkan (Googlebot).
     */
    protected $allowedDomains = [
        'googlebot.com',
        'google.com',
    ];

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

        // 🔹 Lakukan reverse DNS lookup untuk cek apakah IP berasal dari Googlebot
        $host = gethostbyaddr($ip);

        foreach ($this->allowedDomains as $domain) {
            if (stripos($host, $domain) !== false) {
                // ✅ Jika IP berasal dari Googlebot, izinkan akses
                return $next($request);
            }
        }

        // 🔹 Cek lokasi IP dengan API eksternal (pakai cURL)
        $response = Http::timeout(10)->get("http://ip-api.com/json/{$ip}");

        if ($response->failed()) {
            return response()->json(['message' => 'Gagal mengambil informasi lokasi IP.'], 500);
        }

        $geoInfo = $response->json();

        // 🔹 Pastikan IP berasal dari Indonesia
        if (!isset($geoInfo['countryCode']) || strtolower($geoInfo['countryCode']) !== 'id') {
            $country = $geoInfo['country'] ?? 'Tidak Diketahui';

            return response()->json([
                'message' => "Akses ditolak! Anda terdeteksi dari negara {$country}. Anda harus berada di Indonesia untuk mengakses halaman ini."
            ], 403);
        }

        return $next($request);
    }
}
