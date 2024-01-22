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
        $schedule->command('app:enregistrer-statistiques-mensuelles')->everyMinute();
        $schedule->command('app:change-document-communicable-status')->everyMinute();
        $schedule->command('app:create-dynamics-demandes-transferts')->everyMinute();
        $schedule->command('app:send-document-into-demande-transfert')->everyMinute();
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
