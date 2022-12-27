@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-11">
            <h1 class="mb-5">All Tasks</h1>
        </div>
        <div class="col-1 float-right">
            <a href="{{ route('tasks.create') }}" class="btn btn-primary mt-3 w-100">Create New Task</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow bg-light border-0 p-2 mb-5">
                <h2>Tasks Today</h2>
                <div class="table-responsive">
                    <table class="table table-striped ">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Frequency</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($tasksToday as $task)
                            <tr>
                                <td>{{ $task->name }}</td>
                                <td>{{ $task->description }}</td>
                                <td>{{ $task->frequency }}</td>
                                <td>{{ $task->start_date }}</td>
                                <td>{{ $task->end_date }}</td>
                                <td>
                                    <a href="{{ route('tasks.show', $task) }}" class="btn btn-secondary btn-sm">View</a>
                                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                    @if (!$task->is_complete)
                                        <form action="{{ route('tasks.mark_complete', $task) }}" method="POST" class="d-inline-block">
                                            @csrf
                                            <input type="hidden" name="_method" value="PATCH">
                                            <button type="submit" class="btn btn-success btn-sm">Mark as Complete</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card shadow bg-light border-0 p-2 mb-5">
                <h2>Tasks Tomorrow</h2>
                <table class="table table-striped ">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Frequency</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($tasksTomorrow as $task)
                        <tr>
                            <td>{{ $task->name }}</td>
                            <td>{{ $task->description }}</td>
                            <td>{{ $task->frequency }}</td>
                            <td>{{ $task->start_date }}</td>
                            <td>{{ $task->end_date }}</td>
                            <td>
                                <a href="{{ route('tasks.show', $task) }}" class="btn btn-secondary btn-sm">View</a>
                                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                                @if (!$task->is_complete)
                                    <form action="{{ route('tasks.mark_complete', $task) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        <input type="hidden" name="_method" value="PATCH">
                                        <button type="submit" class="btn btn-success btn-sm">Mark as Complete</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card shadow bg-light border-0 p-2 mb-5">
                <h2>Tasks Next Week</h2>
                <table class="table table-striped ">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Frequency</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($tasksNextWeek as $task)
                        <tr>
                            <td>{{ $task->name }}</td>
                            <td>{{ $task->description }}</td>
                            <td>{{ $task->frequency }}</td>
                            <td>{{ $task->start_date }}</td>
                            <td>{{ $task->end_date }}</td>
                            <td>
                                <a href="{{ route('tasks.show', $task) }}" class="btn btn-secondary btn-sm">View</a>
                                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                                @if (!$task->is_complete)
                                    <form action="{{ route('tasks.mark_complete', $task) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        <input type="hidden" name="_method" value="PATCH">
                                        <button type="submit" class="btn btn-success btn-sm">Mark as Complete</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card shadow bg-light border-0 p-2 mb-5">
                <h2>Tasks Next Month</h2>
                <table class="table table-striped ">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Frequency</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($tasksNextMonth as $task)
                        <tr>
                            <td>{{ $task->name }}</td>
                            <td>{{ $task->description }}</td>
                            <td>{{ $task->frequency }}</td>
                            <td>{{ $task->start_date }}</td>
                            <td>{{ $task->end_date }}</td>
                            <td>
                                <a href="{{ route('tasks.show', $task) }}" class="btn btn-secondary btn-sm">View</a>
                                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                                @if (!$task->is_complete)
                                    <form action="{{ route('tasks.mark_complete', $task) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        <input type="hidden" name="_method" value="PATCH">
                                        <button type="submit" class="btn btn-success btn-sm">Mark as Complete</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card shadow bg-light border-0 p-2 mb-5">
                <h2>Other Tasks</h2>
                <table class="table table-striped ">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Frequency</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($otherTasks as $task)
                        <tr>
                            <td>{{ $task->name }}</td>
                            <td>{{ $task->description }}</td>
                            <td>{{ $task->frequency }}</td>
                            <td>{{ $task->start_date }}</td>
                            <td>{{ $task->end_date }}</td>
                            <td>
                                <a href="{{ route('tasks.show', $task) }}" class="btn btn-secondary btn-sm">View</a>
                                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                                @if (!$task->is_complete)
                                    <form action="{{ route('tasks.mark_complete', $task) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        <input type="hidden" name="_method" value="PATCH">
                                        <button type="submit" class="btn btn-success btn-sm">Mark as Complete</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card shadow bg-light border-0 p-2 mb-5">
                <h2>Complete Tasks</h2>
                <table class="table table-striped ">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Frequency</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($completedTasks as $task)
                        <tr>
                            <td>{{ $task->name }}</td>
                            <td>{{ $task->description }}</td>
                            <td>{{ $task->frequency }}</td>
                            <td>{{ $task->start_date }}</td>
                            <td>{{ $task->end_date }}</td>
                            <td>
                                <a href="{{ route('tasks.show', $task) }}" class="btn btn-secondary btn-sm">View</a>
                                <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
