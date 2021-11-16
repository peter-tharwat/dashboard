<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        if(Schema::hasTable('settings')){
            $settings = \App\Models\Setting::count();
            if($settings==0)
                \App\Models\Setting::create([]);
            $settings = \App\Models\Setting::first();
            View::share('settings', $settings);
        }
    }
}
