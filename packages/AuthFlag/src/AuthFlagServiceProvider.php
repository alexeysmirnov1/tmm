<?php

namespace Flagstudio\AuthFlag;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Laravel\Ui\AuthRouteMethods;

class AuthFlagServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/auth-flag.php', 'auth-flag'
        );

        Route::middleware('web')
            ->group(__DIR__.'/routes/web.php');
    }

    public function boot(): void
    {
        App::bind('auth.flag', function() {
            return new AuthFlagFacade;
        });

//        $this->loadRoutesFrom(__DIR__.'/routes/api.php');
//        $this->loadRoutesFrom(__DIR__.'/routes/web.php');

//        Route::middleware('web')
//            ->group(__DIR__.'/routes/web.php');

        $this->publishes([
            __DIR__ . '/config/auth-flag.php' => config_path('auth-flag.php'),
        ], 'AuthFlagConfig');

        $this->publishes([
            __DIR__ . '/resources/assets/css' => public_path('vendor/auth-flag/css'),
            __DIR__ . '/resources/assets/logo.svg' => public_path('vendor/auth-flag/logo.svg'),
        ], 'AuthFlagAssets');

        $this->loadViewsFrom(__DIR__ . '/resources/views', 'AuthFlag');

        $this->publishes([
            __DIR__.'/resources/views' => resource_path('views/vendor/AuthFlag'),
        ], 'AuthFlagView');
    }
}
