@extends('layouts.app')

@section('title', 'Index')

@section('content')
    <div class="main-layout-task">
        <!-- Sidebar -->
        <div class="task-menu">
            <h2>TASK</h2>
            <div>
                <ul>
                    <li><a href="{{ route('tasks.index') }}">My Task's</a></li>
                    <li><a href="{{ route('tasks.create') }}">Create Task</a></li>
                </ul>
            </div>
        </div>

        <!-- Konten -->
        <div class="content-task">
            <h1>My Task</h1>

            <!-- Filter -->
            <div class="filter-bar">
                <form method="GET" action="{{ route('tasks.index') }}">
                    <label for="status">Filter Status:</label>
                    <select name="status" id="status" onchange="this.form.submit()">
                        <option value="">All</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>Process
                        </option>
                        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Done</option>
                    </select>
                </form>
            </div>

            @if ($tasks->count())
                <div class="task-grid">
                    @foreach ($tasks as $task)
                        <div class="task-card">
                            <div class="task-info">
                                <strong>{{ $task->title }}</strong>
                                <p>{{ $task->description }}</p>
                                <small class="status">{{ ucfirst(str_replace('_', ' ', $task->status)) }}</small>
                            </div>
                            <div class="task-actions">
                                <a href="{{ route('tasks.edit', $task) }}" class="btn edit">✏️</a>
                                <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn delete"
                                        onclick="return confirm('Are you sure you want to delete this task?')">🗑️</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="empty">no assignment yet</p>
            @endif
        </div>
    </div>
@endsection
