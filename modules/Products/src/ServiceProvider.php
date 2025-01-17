<?php

namespace NormApp\Products;

use NormApp\Products\Interfaces\ProductServiceInterface;
use NormApp\Products\Repositories\ProductRepository;
use Illuminate\Support\ServiceProvider as CoreServiceProvider;
use NormApp\Products\Interfaces\ProductRepositoryInterface;
use NormApp\Products\Services\ProductService;

class ServiceProvider extends CoreServiceProvider
{
    public function register(): void
    {
        parent::register();
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->app->singleton(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->singleton(ProductServiceInterface::class, ProductService::class);
    }

    public function boot()
    {

    }
}
