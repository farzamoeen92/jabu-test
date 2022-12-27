<?php

namespace App\Console;

use App\Models\PeriodicTasks;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function () {
            // Query the database for tasks that need to be completed
            $tasks = PeriodicTasks::where('is_complete', false)
                ->where(function ($query) {
                    // Check if the task should be completed today
                    $query->where('frequency', 'daily')
                        ->orWhere(function ($query) {
                            // Check if the task should be completed on the current day of the week
                            $query->where('frequency', 'weekly')
                                ->where('day_of_week', date('l'));
                        })
                        ->orWhere(function ($query) {
                            // Check if the task should be completed on the current day of the month
                            $query->where('frequency', 'monthly')
                                ->where('day_of_month', date('j'));
                        })
                        ->orWhere(function ($query) {
                            // Check if the task should be completed on the current day of the year
                            $query->where('frequency', 'yearly')
                                ->where('day_of_year', date('z'));
                        });
                })
                ->get();

            // Mark the tasks as complete and update the database
            foreach ($tasks as $task) {
                $task->is_complete = true;
                $task->save();
            }
        })->daily();
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
