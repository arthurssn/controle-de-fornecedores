<?php

namespace App\Providers;

use App\Interfaces\BrasilAPI\IBrasilAPIRepository;
use App\Interfaces\Supplier\ISupplierRepository;
use App\Repositories\BrasilAPIRepository;
use App\Repositories\SupplierRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ISupplierRepository::class, SupplierRepository::class);
        $this->app->bind(IBrasilAPIRepository::class, BrasilAPIRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
