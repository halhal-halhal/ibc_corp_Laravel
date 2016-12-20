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
        \App\Console\Commands\CreateUserTable::class,
        \App\Console\Commands\CreateLessenTable::class,
        \App\Console\Commands\CreateMessageTable::class,
        \App\Console\Commands\CreateMessageContentTable::class,
        \App\Console\Commands\CreateMessageStatusTable::class,
        \App\Console\Commands\CreateCaliculamTable::class,
        \App\Console\Commands\CreateUserGroupTable::class,
        \App\Console\Commands\AddLoginTimeColumnToUserTable::class,];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
    }
}
