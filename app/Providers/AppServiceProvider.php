<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use App\Models\SiteSetting;
use App\Models\Category;

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
    public function boot(): void
    {
        if (Schema::hasTable('site_settings')) {
            $settings = SiteSetting::all()->pluck('value', 'key');
            View::share('globalSettings', $settings);
        }

        if (Schema::hasTable('categories')) {
            $globalCategories = Category::take(5)->get(); // For menu
            View::share('globalCategories', $globalCategories);
        }
    }
}
