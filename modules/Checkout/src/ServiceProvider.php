<?php

namespace NormApp\Checkout;

use Illuminate\Support\ServiceProvider as CoreServiceProvider;
use NormApp\Checkout\Interfaces\BasketRepositoryInterface;
use NormApp\Checkout\Interfaces\BasketServiceInterface;
use NormApp\Checkout\Interfaces\CheckoutRepositoryInterface;
use NormApp\Checkout\Interfaces\CheckoutServiceInterface;
use NormApp\Checkout\Repositories\BasketRepository;
use NormApp\Checkout\Repositories\CheckoutRepository;
use NormApp\Checkout\Services\BasketService;
use NormApp\Checkout\Services\CheckoutService;

class ServiceProvider extends CoreServiceProvider
{
    public function register(): void
    {
        parent::register();
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->app->singleton(BasketRepositoryInterface::class, BasketRepository::class);
        $this->app->singleton(BasketServiceInterface::class, BasketService::class);
        $this->app->singleton(CheckoutRepositoryInterface::class, CheckoutRepository::class);
        $this->app->singleton(CheckoutServiceInterface::class, CheckoutService::class);
    }

    public function boot()
    {

    }
}
