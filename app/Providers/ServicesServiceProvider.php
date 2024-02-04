<?php

namespace App\Providers;

use App\Interfaces\BrasilAPI\IBrasilAPIService;
use App\Interfaces\Supplier\ISupplierService;
use App\Services\BrasilAPIService;
use App\Services\SupplierService;
use Illuminate\Support\ServiceProvider;

class ServicesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ISupplierService::class, SupplierService::class);
        $this->app->bind(IBrasilAPIService::class, BrasilAPIService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
