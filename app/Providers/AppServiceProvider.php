<?php

namespace App\Providers;

use App\Contracts\PaymentGatewayContract;
use App\Contracts\ProductRepositoryContract;
use App\Http\Controllers\API\PaymentController as APIPaymentController;
use App\Http\Controllers\PaymentController;
use App\Repositories\ProductRepository;
use App\Services\PaymentGateway\RobokassaGateway;
use App\Services\PaymentGateway\SberGateway;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if (app()->isProduction()) {
            error_reporting(E_ALL ^ E_NOTICE);
        }
    }

    public function register(): void
    {
        if ($this->app->isLocal() || mb_strtolower(app()->environment()) === 'dev') {
            $this->app->register(TelescopeServiceProvider::class);
        }

        $this->app->when(APIPaymentController::class)
            ->needs(PaymentGatewayContract::class)
            ->give(RobokassaGateway::class);

        $this->app->when(PaymentController::class)
            ->needs(PaymentGatewayContract::class)
            ->give(SberGateway::class);

        $this->app->when(RobokassaGateway::class)
            ->needs('$username')
            ->giveConfig('robokassa.username');

        $this->app->resolving(function ($object, $app) {
            
        });
    }
}
