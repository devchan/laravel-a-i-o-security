<?php
namespace Devchan\LaravelAIOSecurity;

use \Illuminate\Support\ServiceProvider;

class LaravelAIOSecurityServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/views', 'laravel-a-i-o-security');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        $this->mergeConfigFrom(__DIR__ . '/config/laravel-a-i-o-security.php', 'laravel-a-i-o-security');

        $this->publishes([
            __DIR__ . '/config/laravel-a-i-o-security.php' => config_path('laravel-a-i-o-security.php')
        ]);
    }

    public function register()
    {

    }
}