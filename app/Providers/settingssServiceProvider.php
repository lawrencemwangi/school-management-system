<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Settings;
use Illuminate\Support\Facades\Cache;

class settingssServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    { 
        $settings = Cache::remember('school_settings', 60, function () {
            // Fetch all settings from the database if not cached
            return Settings::all()->keyBy('key');
        });

        foreach($settings as $setting)
        {
            Config::set('school_setting.' . $setting->key, $setting->value);
        }
    }
}
