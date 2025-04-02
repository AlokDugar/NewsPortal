<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Setting;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $settings = Setting::first();
        $dash_logoPath = $settings->dashboard_logo;

        if (!Storage::disk('public')->exists($dash_logoPath)) {
            $dash_logoPath = 'dashboard_logo/default_logo.png';
        }
        Config::set('settings.dashboard_logo', "storage/{$dash_logoPath}");
    }
}
