<?php

namespace App\Providers;

use App\Interfaces\UserAddressRepositoryInterface;
use App\Interfaces\UserAddressServiceInterface;
use App\Repositories\UserAddressRepository;
use App\Services\UserAddressService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(UserAddressRepositoryInterface::class, UserAddressRepository::class);
        $this->app->singleton(UserAddressServiceInterface::class, UserAddressService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
