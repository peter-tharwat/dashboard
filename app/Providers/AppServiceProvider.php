<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\URL;
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
        if($this->app->environment('production')) {
            URL::forceScheme('https');
        }
        
        \App\Models\ContactReply::observe(\App\Observers\ContactReplyObserver::class);
        \App\Models\Contact::observe(\App\Observers\ContactObserver::class);
        \App\Models\Menu::observe(\App\Observers\MenuObserver::class);
        \App\Models\MenuLink::observe(\App\Observers\MenuLinkObserver::class);
        \App\Models\Page::observe(\App\Observers\PageObserver::class);
        \App\Models\Article::observe(\App\Observers\ArticleObserver::class);

        Paginator::useBootstrapFive();
        Schema::defaultStringLength(191);
        try{
            $settings = (new \App\Helpers\SettingsHelper)->getAllSettings();
            $website_plugins = cache()->remember('website_plugins',60,function(){
                return \App\Models\Plugin::get();
            });
            View::share('settings', $settings);
        }catch(\Exception $e){/*\Artisan::call("db:seed");*/}

        Collection::macro('paginate', function($perPage, $page = null, $pageName = 'page') {
            $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);
            return new LengthAwarePaginator(
                $this->forPage($page, $perPage), // $items
                $this->count(),                  // $total
                $perPage,
                $page,
                [                                // $options
                    'path' => LengthAwarePaginator::resolveCurrentPath(),
                    'pageName' => $pageName,
                ]
            );
        });
        
    }
}
