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

	'form' => [
		'email' => 'E-mail',
		'new_password' => 'Choose a password',
		'confirm_password' => 'Confirm password',
		'action_reset' => 'Reset',
		'action_register' => 'Register',
	],

    'forgot' => [
	    'title' => 'Forgot password',
	    'meta_title' => 'Forgot password',
	    'action_title' => 'Reset password',
	    'action_message' => 'Insert your e-mail here: we will send you an email with a link that you can use to reset your password.',
    ],

    'reset' => [
	    'title' => 'Reset password',
	    'meta_title' => 'Reset password',
	    'action_title' => 'New password',
	    'action_message' => 'Please insert your e-mail in the form below and choose a new password.',
    ],

	'register' => [
		'title' => 'New user',
		'meta_title' => 'New user',
		'action_title' => 'Register',
		'action_message' => 'Type your e-mail address and choose a password. You will receive an email with instructions on how to confirm your account.',
		'accept' => 'I have read and accepted <a href=":url" target=\"_blank\">:title</a>',
		'accept_mandatory' => 'I have read and accepted <a href=":url" target=\"_blank\">:title</a> (mandatory)',
		'sent_message' => 'In order to verify you address, we sent you a confirmation link at your e-mail address.',
		'sent_action' => 'Re-send verification email',
		'closed_message' => 'Sorry, registrations are closed.',
	],

];
