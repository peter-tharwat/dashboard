<?php

declare(strict_types=1);

return [

    // Manage autoload migrations
    'autoload_migrations' => true,

    // Statistics Database Tables
    'tables' => [
        'data' => 'statistics_data',
        'paths' => 'statistics_paths',
        'geoips' => 'statistics_geoips',
        'routes' => 'statistics_routes',
        'agents' => 'statistics_agents',
        'devices' => 'statistics_devices',
        'requests' => 'statistics_requests',
        'platforms' => 'statistics_platforms',
    ],

    // Statistics Models
    'models' => [
        'path' => \Rinvex\Statistics\Models\Path::class,
        'datum' => \Rinvex\Statistics\Models\Datum::class,
        'geoip' => \Rinvex\Statistics\Models\Geoip::class,
        'route' => \Rinvex\Statistics\Models\Route::class,
        'agent' => \Rinvex\Statistics\Models\Agent::class,
        'device' => \Rinvex\Statistics\Models\Device::class,
        'request' => \Rinvex\Statistics\Models\Request::class,
        'platform' => \Rinvex\Statistics\Models\Platform::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Statistics Crunching Lottery
    |--------------------------------------------------------------------------
    |
    | Raw statistical data needs to be crunched to extract meaningful stories.
    | Here the chances that it will happen on a given request. By default,
    | the odds are 2 out of 100. For better performance consider using
    | task scheduling and set this lottery option to "FALSE" then.
    |
    */

    'lottery' => [2, 100],

    /*
    |--------------------------------------------------------------------------
    | Statistics Cleaning Period
    |--------------------------------------------------------------------------
    |
    | If you would like to clean old statistics automatically, you may specify
    | the number of days after which the it will be wiped automatically.
    | Any records older than this period (in days) will be cleaned.
    |
    | Note that this cleaning process just affects `statistics_requests`
    | only! Other database tables are kept safely untouched anyway.
    |
    */

    'lifetime' => false,

];
