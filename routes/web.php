<?php

/*
|------------------------------------------------------------------------------
| Guest routes
|------------------------------------------------------------------------------
|
| These routes are accessible to everyone, even non-logged users.
|
*/
Route::get( '/', 'HomeController@index' )->name( 'home' );

/*
|------------------------------------------------------------------------------
| OAuth routes
|------------------------------------------------------------------------------
|
| These routes are hooked to the OAuth2Controller which manages
| OAuth2 / OpenIDConnect flows.
|
*/
Route::group( [ 'prefix' => 'oauth' ], function() {
    Route::any( 'authorize', 'OAuth2Controller@auth' )->middleware( 'auth' );
    Route::post( 'token', 'OAuth2Controller@token' );
    Route::get( 'v1/userinfo', 'OAuth2Controller@userinfo' );
} );

/*
|------------------------------------------------------------------------------
| Authentication routes
|------------------------------------------------------------------------------
|
| These routes allows logg in & out from the authentication server,
| new user registration and password reset.
|
*/
Route::auth();

/*
|------------------------------------------------------------------------------
| Logged users routes
|------------------------------------------------------------------------------
|
| These routes are only accessible to logged-in users.
|
*/
Route::group( [ 'middleware' => 'auth' ], function() {
    Route::get( 'profile', 'ProfileController@edit' );
} );

/*
|------------------------------------------------------------------------------
| Admin routes
|------------------------------------------------------------------------------
|
| These routes are only accessible to Administrators.
|
*/
Route::group( [ 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin' ], function() {
    Route::get( 'setting', 'SettingController@edit' );
    Route::put( 'setting', 'SettingController@update' );

    Route::any( 'user/{user}/ban', 'UserController@ban' );
    Route::resource( 'user', 'UserController' );

    Route::resource( 'oauth2-client', 'ClientController' );
    Route::resource( 'oauth2-scope', 'ScopeController' );
} );
