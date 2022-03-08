<?php

namespace App\Console;

 
class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
        RepairStatus::class,
        TencentIM::class,
        ReminderCommand::class,
        TicketsCommand::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $logFile = storage_path('logs/consle-' . date('Ymd') . '.log');

        // 创建会话
        $schedule->command('createSession:user')->everyMinute()->runInBackground()->appendOutputTo($logFile);
         

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
