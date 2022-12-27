<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\PeriodicTasks;

class PeriodicTasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasksToday = PeriodicTasks::where('is_complete', false)
            ->where(function ($query) {
                $query->where('frequency', 'daily')
                    ->orWhere(function ($query) {
                        $query->where('frequency', 'weekly')
                            ->where('day_of_week', Carbon::now()->format('l'));
                    })
                    ->orWhere(function ($query) {
                        $query->where('frequency', 'monthly')
                            ->where('day_of_month', Carbon::now()->format('j'));
                    })
                    ->orWhere(function ($query) {
                        $query->where('frequency', 'yearly')
                            ->where('day_of_year', Carbon::now()->format('z'));
                    });
            })
            ->get();

        $tasksTomorrow = PeriodicTasks::where('is_complete', false)
            ->where(function ($query) {
                $query->where('frequency', 'daily')
                    ->orWhere(function ($query) {
                        $query->where('frequency', 'weekly')
                            ->where('day_of_week', Carbon::now()->addDays(2)->format('l'));
                    })
                    ->orWhere(function ($query) {
                        $query->where('frequency', 'monthly')
                            ->where('day_of_month', Carbon::now()->addDays(2)->format('j'));
                    })
                    ->orWhere(function ($query) {
                        $query->where('frequency', 'yearly')
                            ->where('day_of_year', Carbon::now()->addDays(2)->format('z'));
                    });
            })
            ->get();

        $tasksNextWeek = PeriodicTasks::where('is_complete', false)
            ->where(function ($query) {
                $query->where('frequency', 'daily')
                    ->orWhere(function ($query) {
                        $query->where('frequency', 'weekly')
                            ->where('day_of_week', '>=', Carbon::now()->format('l'))
                            ->where('day_of_week', '<', Carbon::now()->addWeek()->format('l'));
                    })
                    ->orWhere(function ($query) {
                        $query->where('frequency', 'monthly')
                            ->where('day_of_month', '>=', Carbon::now()->format('j'))
                            ->where('day_of_month', '<', Carbon::now()->addWeek()->format('j'));
                    })
                    ->orWhere(function ($query) {
                        $query->where('frequency', 'yearly')
                            ->where('day_of_year', '>=', Carbon::now()->format('z'))
                            ->where('day_of_year', '<', Carbon::now()->addWeek()->format('z'));
                    });
            })
            ->get();

        $tasksNextMonth = PeriodicTasks::where('is_complete', false)
            ->where(function ($query) {
                $nextMonthStart = Carbon::now()->addMonth()->startOfMonth();
                $nextMonthEnd = Carbon::now()->addMonth()->endOfMonth();
                $query->where('frequency', 'daily')
                    ->orWhere(function ($query) use ($nextMonthStart, $nextMonthEnd) {
                        $query->where('frequency', 'weekly')
                            ->where('day_of_week', '>=', $nextMonthStart->format('l'))
                            ->where('day_of_week', '<=', $nextMonthEnd->format('l'));
                    })
                    ->orWhere(function ($query) use ($nextMonthStart, $nextMonthEnd) {
                        $query->where('frequency', 'monthly')
                            ->where('day_of_month', '>=', $nextMonthStart->format('j'))
                            ->where('day_of_month', '<=', $nextMonthEnd->format('j'));
                    })
                    ->orWhere(function ($query) use ($nextMonthStart, $nextMonthEnd) {
                        $query->where('frequency', 'yearly')
                            ->where('day_of_year', '>=', $nextMonthStart->format('z'))
                            ->where('day_of_year', '<=', $nextMonthEnd->format('z'));
                    });
            })
            ->get();

        $completedTasks = PeriodicTasks::where('is_complete', true)
            ->paginate(10);

        $otherTasks = PeriodicTasks::where('is_complete', false)
            ->paginate(10);

        return view('tasks.index', compact('tasksToday', 'tasksTomorrow', 'tasksNextWeek', 'tasksNextMonth', 'completedTasks', 'otherTasks'));
    }


    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'nullable',
            'frequency' => 'required|in:daily,weekly,monthly,yearly',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after:start_date',
            'day_of_week' => 'nullable|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'day_of_month' => 'nullable|min:1|max:31',
            'day_of_year' => 'nullable|min:1|max:365',
        ]);

        PeriodicTasks::create($request->all());

        return redirect()->route('tasks.index');
    }

    public function show(PeriodicTasks $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(PeriodicTasks $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, PeriodicTasks $task)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'nullable',
            'frequency' => 'required|in:daily,weekly,monthly,yearly',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after:start_date',
            'day_of_week' => 'nullable|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'day_of_month' => 'nullable|min:1|max:31',
            'day_of_year' => 'nullable|min:1|max:365',
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index');
    }

    public function destroy(PeriodicTasks $task)
    {
        $task->delete();

        return redirect()->route('tasks.index');
    }

    public function markComplete(PeriodicTasks $task)
    {
        $task->is_complete = true;
        $task->save();

        return redirect()->route('tasks.index');
    }
}
