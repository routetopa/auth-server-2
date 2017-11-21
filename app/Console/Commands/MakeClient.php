<?php

namespace App\Console\Commands;

use App\Client;
use App\Scope;
use Illuminate\Console\Command;

class MakeClient extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'oauth2:client {client_id} {client_secret} {redirect_uri} {grant_types} {scope} {user_id} {title} {home_uri} {init_oauth_uri} {auto_authorize}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds a new OAuth2 Client.';

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

        $client = new Client;
        $client->client_id = $this->argument('client_id');
        $client->client_secret = $this->argument('client_secret');
        $client->redirect_uri = $this->argument('redirect_uri');
        $client->grant_types = $this->argument('grant_types');
        $client->scope = $this->argument('scope');
        $client->user_id = $this->argument('user_id');
        $client->title = $this->argument('title');
        $client->home_uri = $this->argument('home_uri');
        $client->init_oauth_uri = $this->argument('init_oauth_uri');
        $client->auto_authorize = $this->argument('auto_authorize');

        $saved = $client->save();

        if ($saved) {
            $this->info("SUCCESS: Created Client {$client->client_id}");
        } else {
            $this->error("ERROR: Could not create Client {$client->client_id}");
        }
    }

    private function validate()
    {
        $clients_table = (new Client)->getTable();

        $validator = \Illuminate\Support\Facades\Validator::make(
            $this->arguments(),
            [
                'client_id' => "required|string|unique:{$clients_table}",
                'client_secret' => 'nullable|string',
                'redirect_uri' => 'nullable|url',
                'grant_types' => 'string',
                'scope' => 'string',
                'user_id' => 'nullable|string',
                'title' => 'nullable|string',
                'home_uri' => 'nullable|url',
                'init_oauth_uri' => 'nullable|url',
                'auto_authorize' => 'nullable|boolean',
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
