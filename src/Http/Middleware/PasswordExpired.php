<?php

namespace Devchan\LaravelAIOSecurity\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class PasswordExpired
{

    public function handle($request, Closure $next)
    {
        $user = $request->user();
        $password_changed_at = new Carbon(($user->password_changed_at) ? $user->password_changed_at : $user->created_at);

        if (Carbon::now()->diffInDays($password_changed_at) >= config('laravel-a-i-o-security.password_expires_days')) {
            return redirect()->route('password.expired');
        }

        return $next($request);
    }
}
