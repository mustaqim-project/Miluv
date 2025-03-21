<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
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

        // 🔹 Batasi 10 request per 1 menit per IP
        if (RateLimiter::tooManyAttempts($key, 10)) {
            return response()->view('errors.429', [], 429);
        }


        
        RateLimiter::hit($key, 60);

        // 🔹 Lakukan reverse DNS lookup untuk cek apakah IP berasal dari Googlebot
        $host = gethostbyaddr($ip);

        foreach ($this->allowedDomains as $domain) {
            if (stripos($host, $domain) !== false) {
                // ✅ Jika IP berasal dari Googlebot, izinkan akses tanpa batas
                return $next($request);
            }
        }

        return $next($request);
    }
}
