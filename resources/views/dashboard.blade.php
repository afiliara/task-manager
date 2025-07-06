@extends('layouts.app')

@section('title', 'Task Dashboard')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Left Column -->
    <div class="lg:col-span-2 space-y-6">
        <!-- Task Stats -->
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-bold text-pink-600 mb-4">Task Overview</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="bg-gray-50 p-4 rounded-lg text-center">
                    <div class="text-2xl font-bold text-pink-600">{{ $stats['total'] }}</div>
                    <div class="text-gray-600">Total Tasks</div>
                </div>
                <div class="bg-green-50 p-4 rounded-lg text-center">
                    <div class="text-2xl font-bold text-green-600">{{ $stats['completed'] }}</div>
                    <div class="text-gray-600">Completed</div>
                </div>
                <div class="bg-yellow-50 p-4 rounded-lg text-center">
                    <div class="text-2xl font-bold text-yellow-600">{{ $stats['in_progress'] }}</div>
                    <div class="text-gray-600">In Progress</div>
                </div>
                <div class="bg-blue-50 p-4 rounded-lg text-center">
                    <div class="text-2xl font-bold text-blue-600">{{ $stats['pending'] }}</div>
                    <div class="text-gray-600">Pending</div>
                </div>
            </div>
        </div>

        <!-- All Tasks -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-pink-600">All Tasks</h2>
                <a href="{{ route('tasks.create') }}" class="btn-pink bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-lg text-sm font-medium">
                    <i class="fas fa-plus mr-2"></i> New Task
                </a>
            </div>

            <div class="space-y-4">
                @forelse($tasks as $task)
                    <div class="task-card bg-white p-4 border border-gray-200 rounded-lg">
                        <div class="flex items-start space-x-3">
                            <!-- Status Checkbox -->
                            <form action="{{ route('tasks.toggle-complete', $task->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="checkbox"
                                       class="task-checkbox"
                                       {{ $task->is_completed ? 'checked' : '' }}
                                       onclick="this.form.submit()">
                            </form>

                            <div class="flex-1">
                                <h3 class="font-bold {{ $task->is_completed ? 'line-through text-gray-400' : 'text-gray-800' }}">
                                    {{ $task->title }}
                                </h3>
                                <p class="text-gray-600 text-sm mt-1">{{ $task->description }}</p>

                                <div class="mt-3 flex flex-wrap items-center gap-2">
                                    <!-- Status Badge -->
                                    <span class="px-2 py-1 rounded-full text-xs font-medium
                                        @if($task->status == 'completed') status-completed
                                        @elseif($task->status == 'in_progress') status-in_progress
                                        @else status-pending
                                        @endif">
                                        {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                                    </span>

                                    <!-- Due Date -->
                                    @if($task->due_date)
                                    <span class="text-xs text-gray-500 flex items-center">
                                        <i class="far fa-calendar-alt mr-1"></i>
                                        {{ $task->due_date->format('M d, Y') }}
                                    </span>
                                    @endif

                                    <!-- Priority -->
                                    <span class="text-xs flex items-center
                                        @if($task->priority == 'high') priority-high
                                        @elseif($task->priority == 'medium') priority-medium
                                        @else priority-low
                                        @endif">
                                        <i class="fas fa-flag mr-1"></i>
                                        {{ ucfirst($task->priority) }}
                                    </span>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex space-x-2">
                                <a href="{{ route('tasks.edit', $task->id) }}" class="text-blue-500 hover:text-blue-700">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Delete this task?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-8 text-gray-500">
                        You don't have any tasks yet. Create your first task!
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Right Column -->
    <div class="space-y-6">
        <!-- Recent Tasks -->
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-bold text-pink-600 mb-4">Recent Tasks</h2>
            <div class="space-y-3">
                @forelse($recentTasks as $task)
                    <div class="flex items-center space-x-3 p-2 hover:bg-gray-50 rounded">
                        <input type="checkbox"
                               class="task-checkbox"
                               {{ $task->is_completed ? 'checked' : '' }}
                               disabled>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium truncate {{ $task->is_completed ? 'line-through text-gray-400' : 'text-gray-700' }}">
                                {{ $task->title }}
                            </p>
                            <div class="flex items-center space-x-2 text-xs text-gray-500">
                                @if($task->due_date)
                                <span>
                                    <i class="far fa-calendar-alt mr-1"></i>
                                    {{ $task->due_date->format('M d') }}
                                </span>
                                @endif
                                <span class="px-1.5 py-0.5 rounded-full
                                    @if($task->status == 'completed') status-completed
                                    @elseif($task->status == 'in_progress') status-in_progress
                                    @else status-pending
                                    @endif">
                                    {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                                </span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-4 text-gray-500 text-sm">
                        No recent tasks
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-bold text-pink-600 mb-4">Quick Actions</h2>
            <div class="space-y-3">
                <a href="{{ route('tasks.create') }}" class="flex items-center space-x-3 p-2 hover:bg-gray-50 rounded-lg">
                    <div class="w-8 h-8 rounded-full bg-pink-100 text-pink-600 flex items-center justify-center">
                        <i class="fas fa-plus"></i>
                    </div>
                    <span class="font-medium">Create New Task</span>
                </a>
                <a href="{{ route('tasks.index') }}" class="flex items-center space-x-3 p-2 hover:bg-gray-50 rounded-lg">
                    <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center">
                        <i class="fas fa-tasks"></i>
                    </div>
                    <span class="font-medium">View All Tasks</span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
