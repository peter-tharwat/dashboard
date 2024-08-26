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
        \App\Console\Commands\CreateDatabase::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        $schedule_controller = "\App\Http\Controllers\Backend\BackendScheduleController";

        $schedule->call("$schedule_controller@update_traffics_country")->name("update_traffics_country")->withoutOverlapping()->everyMinute();
        $schedule->call("$schedule_controller@update_under_attack")->name("update_under_attack")->withoutOverlapping()->everyFiveMinutes();

        $schedule->call("$schedule_controller@clean_system")->daily();
            
        
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
