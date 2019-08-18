<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        if(isset($_SERVER['SERVER_PORT']) && /*!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' &&*/ $_SERVER['SERVER_PORT'] == 443) {
            \URL::forceScheme('https');
         }

        // if (env('APP_ENV') === 'production') {
        //     \URL::forceScheme('https');
        //   }
        //   else 
    }
}
