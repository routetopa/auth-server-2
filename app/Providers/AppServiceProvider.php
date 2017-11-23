<?php

namespace App\Providers;

use App\Setting;
use App\User;
use Illuminate\Support\Facades\Cache;
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

        // When a Setting is saved, force a cache update
	    Setting::saved( function( $setting ) {
		    $setting->purge();
	    } );

	    // When a User is deleted, also delete its Facebook login details
	    User::deleting( function ( $user ) {
            $user->facebook()->delete();
        });
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
