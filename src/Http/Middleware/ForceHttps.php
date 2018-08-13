<?php

namespace Devchan\LaravelAIOSecurity\Http\Middleware;

use Closure;

class ForceHttps
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (config('laravel-a-i-o-security.https_force') === true and
            (
                !$request->secure() or
                (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) and $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'http')
            )
        ) {
            return redirect()->secure($request->path());
        }

        return $next($request);
    }
}
