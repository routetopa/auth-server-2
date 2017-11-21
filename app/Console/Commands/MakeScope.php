<?php

namespace App\Console\Commands;

use App\Scope;
use Illuminate\Console\Command;

class MakeScope extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'oauth2:scope {scope} {is_default}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds a new OAuth2 Scope.';

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

        $scope = new Scope;
        $scope->scope = $this->argument('scope');
        $scope->is_default = $this->argument('is_default');
        $saved = $scope->save();

        if ($saved) {
            $this->info("SUCCESS: Created Scope {$scope->scope}");
        } else {
            $this->error("ERROR: Could not create Scope {$scope->scope}");
        }
    }

    private function validate()
    {
        $scopes_table = (new Scope())->getTable();

        $validator = \Illuminate\Support\Facades\Validator::make(
            $this->arguments(),
            [
                'scope' => "required|string|unique:{$scopes_table}",
                'is_default' => 'required|boolean',
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
