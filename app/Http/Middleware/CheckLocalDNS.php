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
        $host = gethostbyaddr($request->ip());
        
        // Cek apakah host mengandung domain lokal Indonesia (.id)
        if (strpos($host, '.id') === false) {
            abort(404);
        }

        return $next($request);
    }
}
