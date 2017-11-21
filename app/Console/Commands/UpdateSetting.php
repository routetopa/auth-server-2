<?php

namespace App\Console\Commands;

use App\Setting;
use Illuminate\Console\Command;

class UpdateSetting extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'oauth2:setting {key} {value}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Change value to a setting';

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

        $setting = Setting::find( $this->argument( 'key' ) );
        $setting->value = $this->argument( 'value' );
        $saved = $setting->save();

        if ($saved) {
            $this->info("SUCCESS: Updated setting with ID: {$setting->key}");
        } else {
            $this->error("ERROR: Could not update setting {$setting->key}");
        }
    }

    private function validate()
    {
        $settings_table = (new Setting)->getTable();

        $validator = \Illuminate\Support\Facades\Validator::make(
            $this->arguments(),
            [
                'key' => "required|exists:{$settings_table}",
                'value' => 'required',
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
