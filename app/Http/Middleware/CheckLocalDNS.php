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
    
        // Gunakan API ipinfo.io untuk mendapatkan informasi lokasi
        $geoInfo = @json_decode(file_get_contents("https://ipinfo.io/{$ip}/json"), true);
    
        if (!isset($geoInfo['country']) || strtolower($geoInfo['country']) !== 'id') {
            abort(404);
        }
    
        return $next($request);
    }
    
}
