<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SalesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('App\Repositories\Sales\SalesContract', 'App\Repositories\Sales\EloquentSalesRepository');

    }
}
