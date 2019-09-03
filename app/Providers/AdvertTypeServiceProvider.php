<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AdvertTypeServiceProvider extends ServiceProvider
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
    public function boot(){
        $this->app->bind('App\Repositories\AdvertType\AdvertTypeContract', 'App\Repositories\AdvertType\EloquentAdvertTypeRepository');

    }
}
