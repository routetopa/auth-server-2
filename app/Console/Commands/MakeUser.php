<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class MakeUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'oauth2:user {email} {password} {is_admin=0}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a user.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->validate();

        $user = new User;
        $user->email = $this->argument('email');
        $user->is_banned = 0;
        $user->roles = $this->argument('is_admin') ? 'admin' : '';
        $user->password = bcrypt($this->argument('password'));
        $saved = $user->save();

        if ($saved) {
            $this->info("SUCCESS: Created user with ID: {$user->id}");
        } else {
            $this->error("ERROR: Could not create user.");
        }
    }

    private function validate()
    {
        $users_table = (new User)->getTable();

        $validator = \Illuminate\Support\Facades\Validator::make(
            $this->arguments(),
            [
                'email' => "required|email|unique:{$users_table}",
                'password' => 'required|string',
                'is_admin' => 'boolean',
            ]
        );

        if ($validator->fails())
        {
            $errors = $validator->errors()->all();
            foreach ($errors as $error) {
                $this->error("ERROR: {$error}");
            }
            die();
        }
    }
}
