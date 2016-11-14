<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed' => 'These credentials do not match our records.',
    'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',

	'login' => [
		'meta_title' => 'Login',
		'title' => 'Welcome',
		'login_card' => [
			'title' => 'Log in',
			'message' => 'If you are already registered, log in using your username and password.',
			'action' => 'Log in',
			'email' => 'E-mail',
			'password' => 'Password',
			'remember_me' => 'Remember me',
		],
		'register_card' => [
			'title' => 'New user?',
			'message' => 'Join us and start working on Open Data: create, publish and discuss them.',
			'action' => 'Register now',
		],
		'password_reset_card' => [
			'title' => 'Forgot password?',
			'message' => 'We can e-mail you a link that will help you in resetting your password.',
			'action' => 'Reset password',
		],
	],

];
