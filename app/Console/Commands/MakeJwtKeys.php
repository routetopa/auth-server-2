<?php

namespace App\Console\Commands;

use App\Helpers\JwtKeys;
use Illuminate\Console\Command;

class MakeJwtKeys extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'oauth2:jwt_keys {filename}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new pair of keys and enables JWT responses';

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

        $keysHelper = new JwtKeys();
        $keys = $keysHelper->makeKeys( $this->argument('filename' ) );

        if ( ! $keys )
        {
            $this->error("ERROR: Could not create keys");
            return;
        }

        $saved = $keysHelper->setKeys( $keys );

        if ( $saved )
        {
            $public_name_key = JwtKeys::PUBLIC_NAME;
            $private_name_key = JwtKeys::PRIVATE_NAME;
            $this->info("SUCCESS: Created key pair ({$keys[$public_name_key]},{$keys[$private_name_key]})");
        }
        else
        {
            $this->error("ERROR: Could not save settings");
        }
    }

    private function validate()
    {
        $validator = \Illuminate\Support\Facades\Validator::make(
            $this->arguments(),
            [
                'filename' => 'nullable|string',
            ]
        );

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            foreach ($errors as $error) {
                $this->error("ERROR: {$error}");
            }
            die();
        }
    }
}
