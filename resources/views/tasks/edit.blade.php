@extends('layouts.app')

@section('content')
    <h1>Edit Task</h1>

    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $task->name) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control">{{ old('description', $task->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="frequency">Frequency</label>
            <select name="frequency" id="frequency" class="form-control" required>
                <option value="">Select a frequency</option>
                <option value="daily" {{ old('frequency', $task->frequency) == 'daily' ? 'selected' : '' }}>Daily</option>
                <option value="weekly" {{ old('frequency', $task->frequency) == 'weekly' ? 'selected' : '' }}>Weekly</option>
                <option value="monthly" {{ old('frequency', $task->frequency) == 'monthly' ? 'selected' : '' }}>Monthly</option>
                <option value="yearly" {{ old('frequency', $task->frequency) == 'yearly' ? 'selected' : '' }}>Yearly</option>
            </select>
        </div>

        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date', $task->start_date) }}">
        </div>

        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ old('end_date', $task->end_date) }}">
        </div>

        <div class="form-group">
            <label for="day_of_week">Day of Week</label>
            <select name="day_of_week" id="day_of_week" class="form-control">
                <option value="">Select a day of the week</option>
                <option value="Monday" {{ old('day_of_week', $task->day_of_week) == 'Monday' ? 'selected' : '' }}>Monday</option>
                <option value="Tuesday" {{ old('day_of_week', $task->day_of_week) == 'Tuesday' ? 'selected' : '' }}>Tuesday</option>
                <option value="Wednesday" {{ old('day_of_week', $task->day_of_week) == 'Wednesday' ? 'selected' : '' }}>Wednesday</option>
                <option value="Thursday" {{ old('day_of_week', $task->day_of_week) == 'Thursday' ? 'selected' : '' }}>Thursday</option>
                <option value="Friday" {{ old('day_of_week', $task->day_of_week) == 'Friday' ? 'selected' : '' }}>Friday</option>
                <option value="Saturday" {{ old('day_of_week', $task->day_of_week) == 'Saturday' ? 'selected' : '' }}>Saturday</option>
                <option value="Sunday" {{ old('day_of_week', $task->day_of_week) == 'Sunday' ? 'selected' : '' }}>Sunday</option>
            </select>
        </div>

        <div class="form-group">
            <label for="day_of_month">Day of Month</label>
            <input type="number" name="day_of_month" id="day_of_month" class="form-control" value="{{ old('day_of_month', $task->day_of_month) }}" min="1" max="31">
        </div>

        <div class="form-group">
            <label for="day_of_year">Day of Year</label>
            <input type="number" name="day_of_year" id="day_of_year" class="form-control" value="{{ old('day_of_year', $task->day_of_year) }}" min="1" max="366">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update Task</button>
        </div>
    </form>
@endsection
