<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Log;
use App\Classes\Helper;

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
      $schedule->call(function ()
      {
            $job = new Helper;
            $job->readRssPartner();

      })->everyMinute();

      $schedule->call(function ()
      {
            $job = new Helper;
            $job->syncYamisokDataTeams();

      })->everyMinute();

      $schedule->call(function ()
      {
            $job = new Helper;
            $job->syncYamisokDataMatch();

      })->everyMinute();

      // $schedule->call(function ()
      // {
            //Helper::instance()->syncYamisokDataMatch();
      // })->everyMinute();
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
