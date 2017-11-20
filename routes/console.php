<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('make:administrator {email} {password}', function ($email, $password) {
    $admin_cnt = \App\User::where( 'roles', 'like', '%admin%' )->count();
    if ($admin_cnt > 0) {
        $this->error("ERROR: There are already administrators.");
        die();
    }

    $user = new \App\User;

    $users_table = $user->getTable();

    $validator = \Illuminate\Support\Facades\Validator::make(
        [ 'email' => $email, 'password' => $password ],
        [
            'email' => "required|email|unique:{$users_table}",
            'password' => 'required|string',
        ]
    );

    if ($validator->fails()) {
        $errors = $validator->errors()->all();
        foreach ($errors as $error) {
            $this->error("ERROR: {$error}");
        }
        die();
    }

    $user->email = $email;
    $user->is_banned = 0;
    $user->roles = 'admin';
    $user->password = bcrypt($password);
    $user->save();

    if ($user->id) {
        $this->info("SUCCESS: Created user with ID: {$user->id}");
    } else {
        $this->error("ERROR: Could not create user.");
    }
})->describe('Add an administrator');
