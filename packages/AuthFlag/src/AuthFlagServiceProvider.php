<?php

namespace Flagstudio\AuthFlag;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class AuthFlagServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/auth-flag.php', 'auth-flag'
        );
    }

    public function boot(): void
    {
        App::bind('auth.flag', function() {
            return new AuthFlagFacade;
        });

        $this->publishes([
            __DIR__ . '/config/auth-flag.php' => config_path('auth-flag.php'),
        ], 'AuthFlagConfig');

        $this->publishes([
            __DIR__ . '/resources/assets/css' => public_path('vendor/auth-flag/css'),
            __DIR__ . '/resources/assets/logo.svg' => public_path('vendor/auth-flag/logo.svg'),
        ], 'AuthFlagAssets');

        $this->loadViewsFrom(__DIR__ . '/resources/views', 'AuthFlag');
    }
}
