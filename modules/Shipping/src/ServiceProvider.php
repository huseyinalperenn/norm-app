<?php

namespace NormApp\Shipping;

use Illuminate\Support\ServiceProvider as CoreServiceProvider;
use NormApp\Shipping\Interfaces\ShippingRepositoryInterface;
use NormApp\Shipping\Interfaces\ShippingServiceInterface;
use NormApp\Shipping\Repositories\ShippingRepository;
use NormApp\Shipping\Services\ShippingService;

class ServiceProvider extends CoreServiceProvider
{
    public function register(): void
    {
        parent::register();
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->app->singleton(ShippingRepositoryInterface::class, ShippingRepository::class);
        $this->app->singleton(ShippingServiceInterface::class, ShippingService::class);
    }

    public function boot()
    {

    }
}
