<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
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

        // Menggunakan layanan geolokasi untuk mendeteksi negara berdasarkan IP
        $geoInfo = @json_decode(file_get_contents("https://ipapi.co/{$ip}/json/"), true);

        // Jika tidak bisa mendapatkan data atau negara bukan Indonesia, blokir akses
        if (!isset($geoInfo['country']) || strtolower($geoInfo['country']) !== 'id') {
            abort(404);
        }

        return $next($request);
    }
}
