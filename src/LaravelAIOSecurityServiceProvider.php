<?php
namespace Devchan\LaravelAIOSecurity;

use Devchan\LaravelAIOSecurity\Classes\Purifier;
use Devchan\LaravelAIOSecurity\Listeners\ClearUserSessionId;
use Devchan\LaravelAIOSecurity\Listeners\StoreUserSessionId;
use Illuminate\Auth\Events\Authenticated;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Event;
use Laravel\Passport\Events\AccessTokenCreated;
use Laravel\Passport\Events\RefreshTokenCreated;
use Illuminate\Container\Container;
use \Illuminate\Support\ServiceProvider;

class LaravelAIOSecurityServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/views', 'laravel-a-i-o-security');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        $this->publishes([
            __DIR__ . '/config/laravel-a-i-o-security.php' => config_path('laravel-a-i-o-security.php')
        ]);

        if (config('laravel-a-i-o-security.https_force')) {
            $this->app['url']->forceScheme('https');
        }

        Event::listen(Login::class, ClearUserSessionId::class);
        Event::listen(Authenticated::class, StoreUserSessionId::class);

        if (Config::get('laravel-a-i-o-security.single-session.prune_and_revoke_tokens')) {
            Event::listen(AccessTokenCreated::class, Listeners\RevokeOldTokens::class);
            Event::listen(RefreshTokenCreated::class, Listeners\PruneOldTokens::class);
        }

    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/laravel-a-i-o-security.php', 'laravel-a-i-o-security');

        $this->app->singleton('purifier', function (Container $app) {
            return new Purifier($app['files'], $app['config']);
        });

        $this->app->alias('purifier', Purifier::class);
    }

    public function provides()
    {
        return ['purifier'];
    }
}