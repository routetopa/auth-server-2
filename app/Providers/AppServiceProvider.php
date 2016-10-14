<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use LucaVicidomini\BladeMaterialize\BladeExtender;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        BladeExtender::extend();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
