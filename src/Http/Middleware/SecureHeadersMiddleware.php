<?php

namespace Devchan\LaravelAIOSecurity\Http\Middleware;

use Closure;
use Devchan\LaravelAIOSecurity\Classes\SecureHeaders;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SecureHeadersMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     *
     * @return Response
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        $headers = (new SecureHeaders(config('laravel-a-i-o-security.secure-headers', [])))->headers();

        foreach ($headers as $key => $value) {
            $response->headers->set($key, $value, true);
        }

        return $response;
    }
}
