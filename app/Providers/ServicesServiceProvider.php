<?php

namespace App\Providers;

use App\Interfaces\Supplier\ISupplierService;
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
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
