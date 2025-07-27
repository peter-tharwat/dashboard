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
        \App\Models\Plugin::observe(\App\Observers\PluginObserver::class);


        Paginator::useBootstrapFive();
        Schema::defaultStringLength(191);
        try{
            $settings = (new \SettingsHelper)->getAllSettings();
            $website_plugins = (new \PluginsHelper)->getAllPlugins();
            \MainHelper::setWebsiteConfigs($website_plugins);
            View::share('settings', $settings);
            View::share('website_plugins', $website_plugins);
            
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
