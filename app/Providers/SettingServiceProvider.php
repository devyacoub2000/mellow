<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cache;

class SettingServiceProvider extends ServiceProvider
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
        // get settings from database by key and value and put it to cash after that share this component with layout Page .. 

        Cache::remember('settings', 3600, function() {
           return \App\Models\Setting::pluck('value', 'key')->toArray();
        });
       
    }
}
