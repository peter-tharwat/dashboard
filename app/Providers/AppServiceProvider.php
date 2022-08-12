<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use View;

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

        \App\Models\ContactReply::observe(\App\Observers\ContactReplyObserver::class);
        \App\Models\Contact::observe(\App\Observers\ContactObserver::class);

        Paginator::useBootstrapFive();
        Schema::defaultStringLength(191);

        if(Schema::hasTable('settings')){
            $settings = \App\Models\Setting::first();
            View::share('settings', $settings);
        }
        
    }
}
