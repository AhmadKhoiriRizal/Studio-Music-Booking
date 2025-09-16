<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // Backup database daily at 2:00 AM
        $schedule->command('backup:run')->dailyAt('02:00');

        // Clean up old backups weekly
        $schedule->command('backup:clean')->weekly();

        // Monitor backup health daily
        $schedule->command('backup:monitor')->daily();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
