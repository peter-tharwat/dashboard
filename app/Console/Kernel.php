<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call('\App\Http\Controllers\Backend\BackendScheduleController@update_traffics_country')->everyMinute();
        $schedule->call('\App\Http\Controllers\Backend\BackendScheduleController@update_under_attack_limits')->everyFiveMinutes();
        $schedule->call('\App\Http\Controllers\Backend\BackendScheduleController@clean_items_seens')->daily();
        $schedule->call('\App\Http\Controllers\Backend\BackendScheduleController@clean_dashboard_logs')->daily();
        $schedule->call('\App\Http\Controllers\Backend\BackendScheduleController@clean_sessions_rate_limits')->daily();
        
        
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
