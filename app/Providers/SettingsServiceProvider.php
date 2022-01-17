<?php

namespace App\Providers;

use Schema;
use App\Models\Settings;
use Illuminate\Support\ServiceProvider;

class SettingsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if(Schema::hasTable('settings'))
        {
            // $setting = Settings::first();
            // config()->set('settings.config', $setting);
            // config()->set('settings.config', ['key' => 'value']);
            $this->app->singleton('settings', function(){
                return Settings::first();
            });
        }
    }
}
