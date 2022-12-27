<?php

namespace Database\Seeders;

use App\Models\PeriodicTasks;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PeriodicTasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Today's tasks
        PeriodicTasks::create([
            'name' => 'Call John about the meeting',
            'frequency' => 'daily',
            'start_date' => Carbon::today(),
            'end_date' => Carbon::today()->addWeek()
        ]);

        PeriodicTasks::create([
            'name' => 'Finish report for the presentation',
            'frequency' => 'daily',
            'start_date' => Carbon::today(),
            'end_date' => Carbon::today()->addWeek()
        ]);

        // Tomorrow's tasks
        PeriodicTasks::create([
            'name' => 'Book travel arrangements for next business trip',
            'frequency' => 'daily',
            'start_date' => Carbon::tomorrow(),
            'end_date' => Carbon::tomorrow()->addWeek()
        ]);

        PeriodicTasks::create([
            'name' => 'Send email to team about project updates',
            'frequency' => 'daily',
            'start_date' => Carbon::tomorrow(),
            'end_date' => Carbon::tomorrow()->addWeek()
        ]);

        // Tasks for next week
        PeriodicTasks::create([
            'name' => 'Attend training session on Wednesday',
            'frequency' => 'weekly',
            'start_date' => Carbon::today()->addWeek(),
            'end_date' => Carbon::today()->addWeeks(2),
            'day_of_week' => 'Wednesday'
        ]);

        PeriodicTasks::create([
            'name' => 'Schedule meeting with client for next Friday',
            'frequency' => 'weekly',
            'start_date' => Carbon::today()->addWeek(),
            'end_date' => Carbon::today()->addWeeks(2),
            'day_of_week' => 'Friday'
        ]);

        // Tasks for next month
        PeriodicTasks::create([
            'name' => 'Renew business insurance',
            'frequency' => 'monthly',
            'start_date' => Carbon::today()->addMonth(),
        'end_date' => Carbon::today()->addMonths(2)
        ]);
        PeriodicTasks::create([
            'name' => 'Order new office supplies for next quarter',
            'frequency' => 'monthly',
            'start_date' => Carbon::today()->addMonth(),
            'end_date' => Carbon::today()->addMonths(2)
        ]);
        PeriodicTasks::create([
            'name' => 'Plan team building event for next month',
            'frequency' => 'monthly',
            'start_date' => Carbon::today()->addMonth(),
            'end_date' => Carbon::today()->addMonths(2)
        ]);
        PeriodicTasks::create([
            'name' => 'Update company website with new products and services',
            'frequency' => 'monthly',
            'start_date' => Carbon::today()->addMonth(),
            'end_date' => Carbon::today()->addMonths(2)
        ]);

//        PeriodicTasks::create([
//            'name' => 'Task 1',
//            'description' => 'This is a daily task',
//            'frequency' => 'daily',
//        ]);
//
//        PeriodicTasks::create([
//            'name' => 'Task 2',
//            'description' => 'This is a weekly task',
//            'frequency' => 'weekly',
//            'day_of_week' => 'Monday',
//        ]);
//
//        PeriodicTasks::create([
//            'name' => 'Task 3',
//            'description' => 'This is a monthly task',
//            'frequency' => 'monthly',
//            'day_of_month' => '5',
//        ]);
//
//        PeriodicTasks::create([
//            'name' => 'Task 4',
//            'description' => 'This is a yearly task',
//            'frequency' => 'yearly',
//            'day_of_year' => '120',
//        ]);
        // Create tasks for today
//        for ($i = 0; $i < 5; $i++) {
//            PeriodicTasks::create([
//                'name' => "Task for today $i",
//                'description' => 'Task for today',
//                'frequency' => 'daily',
//                'start_date' => Carbon::today(),
//                'end_date' => Carbon::today(),
//                'is_complete' => false,
//            ]);
//        }
//
//        // Create tasks for tomorrow
//        for ($i = 0; $i < 5; $i++) {
//            PeriodicTasks::create([
//                'name' => "Task for tomorrow $i",
//                'description' => 'Task for tomorrow',
//                'frequency' => 'daily',
//                'start_date' => Carbon::tomorrow(),
//                'end_date' => Carbon::tomorrow(),
//                'is_complete' => false,
//            ]);
//        }
//
//        // Create tasks for next week
//        for ($i = 0; $i < 5; $i++) {
//            PeriodicTasks::create([
//                'name' => "Task for next week $i",
//                'description' => 'Task for next week',
//                'frequency' => 'weekly',
//                'start_date' => Carbon::tomorrow()->addDays(7),
//                'end_date' => Carbon::tomorrow()->addDays(7),
//                'day_of_week' => 'Monday',
//                'is_complete' => false,
//            ]);
//        }
//
//        // Create tasks for next month
//        for ($i = 0; $i < 5; $i++) {
//            PeriodicTasks::create([
//                'name' => "Task for next month $i",
//                'description' => 'Task for next month',
//                'frequency' => 'monthly',
//                'start_date' => Carbon::tomorrow()->addMonth(),
//                'end_date' => Carbon::tomorrow()->addMonth(),
//                'day_of_month' => 5,
//                'is_complete' => false,
//            ]);
//        }
//
//        // Create some other tasks
//        for ($i = 0; $i < 5; $i++) {
//            PeriodicTasks::create([
//                'name' => "Other task $i",
//                'description' => 'Other task',
//                'frequency' => 'daily',
//                'start_date' => Carbon::tomorrow()->addDays(7),
//                'end_date' => Carbon::tomorrow()->addDays(14),
//                'is_complete' => false,
//            ]);
//        }
    }
}
