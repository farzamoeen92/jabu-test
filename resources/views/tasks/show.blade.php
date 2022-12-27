@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>{{ $task->name }}</h1>

        <p>{{ $task->description }}</p>

        <p>Frequency: {{ $task->frequency }}</p>

        @if ($task->start_date)
            <p>Start Date: {{ $task->start_date->format('F d, Y') }}</p>
        @endif

        @if ($task->end_date)
            <p>End Date: {{ $task->end_date->format('F d, Y') }}</p>
        @endif

        @if ($task->day_of_week)
            <p>Day of Week: {{ $task->day_of_week }}</p>
        @endif

        @if ($task->day_of_month)
            <p>Day of Month: {{ $task->day_of_month }}</p>
        @endif

        @if ($task->day_of_year)
            <p>Day of Year: {{ $task->day_of_year }}</p>
        @endif

        <p>Is Complete: {{ $task->is_complete ? 'Yes' : 'No' }}</p>

        <div class="row w-50 m-auto justify-content-center">
            @if(!$task->is_complete)
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary mb-3 mr-3">Back</a>
                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-primary mb-3 mr-3">Edit</a>
            @endif
            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>

@endsection
