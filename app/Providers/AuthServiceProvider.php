<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        /*\App\Models\User::class => \App\Policies\UserPolicy::class,
        \App\Models\Category::class => \App\Policies\CategoryPolicy::class,
        \App\Models\Article::class => \App\Policies\ArticlePolicy::class,
        \App\Models\Redirection::class => \App\Policies\RedirectionPolicy::class,
        \App\Models\Contact::class => \App\Policies\ContactPolicy::class,
        \App\Models\Page::class => \App\Policies\PagePolicy::class,
        \App\Models\Menu::class => \App\Policies\MenuPolicy::class,
        \App\Models\MenuLink::class => \App\Policies\MenuLinkPolicy::class,
        \App\Models\Faq::class => \App\Policies\FaqPolicy::class,
        \App\Models\Setting::class => \App\Policies\SettingPolicy::class,
        \App\Models\HubFile::class => \App\Policies\HubFilePolicy::class,
        \App\Models\RateLimit::class => \App\Policies\RateLimitPolicy::class,
        \App\Models\ErrorReport::class => \App\Policies\ErrorReportPolicy::class,
        \App\Models\Announcement::class => \App\Policies\AnnouncementPolicy::class*/
    ];


    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        //$this->registerPolicies();
        //Gate::define('show-statistics',[\App\Policies\StatisticPolicy::class,'viewAny']);
        //Gate::define('create-notifications',[\App\Policies\AdditionalPermissionPolicy::class,'create_notifications']);

    }
}
