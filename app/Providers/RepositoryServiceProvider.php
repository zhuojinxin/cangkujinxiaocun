<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\UserRepository::class, \App\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\GoodRepository::class, \App\Repositories\GoodRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\WarehouseRepository::class, \App\Repositories\WarehouseRepositoryEloquent::class);
        //:end-bindings:
    }
}
