<?php

namespace App\Console\Commands;

use App\Policy;
use App\Scope;
use Illuminate\Console\Command;

class MakePolicy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'oauth2:policy {title} {uri} {is_mandatory=0}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds a new Policy (only using URIs).';

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

        $policy = new Policy;
        $policy->title = $this->argument('title');
        $policy->uri = $this->argument('uri');
        $policy->content = '';
        $policy->is_mandatory = $this->argument('is_mandatory');
        $saved = $policy->save();

        if ($saved) {
            $this->info("SUCCESS: Created Policy with ID: {$policy->id}");
        } else {
            $this->error("ERROR: Could not create Policy");
        }
    }

    private function validate()
    {
        $policies_table = (new Policy)->getTable();

        $validator = \Illuminate\Support\Facades\Validator::make(
            $this->arguments(),
            [
                'title' => 'required|string',
                'uri' => "required|url|unique:{$policies_table}",
                'is_mandatory' => 'required|boolean',
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
