<?php

namespace App\Providers;

use App;
use App\User;
use Illuminate\Support\ServiceProvider;
use OAuth2\GrantType\ClientCredentials;
use OAuth2\GrantType\UserCredentials;
use OAuth2\Server;
use OAuth2\Storage\Pdo;

/**
 * Register the OAuth2 service provider.
 *
 * @package App\Providers
 */
class OAuth2ServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Binds the 'username' field of User to its 'id'.
        // This will make Laravel/Oauth integration easier.
	    User::creating( function( $user ) {
		    $user->username = $user->email;
	    } );
        User::created( function( $user ) {
            $user->username = "rtpa::user::{$user->id}";
            $user->save();
        } );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton( 'oauth2' , function ( $app ) {
            $storage = new Pdo( App::make( 'db' )->getPdo() );
            $server = new Server( $storage );

            $server->addGrantType( new ClientCredentials( $storage ) );
            $server->addGrantType( new UserCredentials( $storage ) );

            return $server;
        });
    }
}
