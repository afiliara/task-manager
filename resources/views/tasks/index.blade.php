@extends('layouts.app')

@section('title', 'My Tasks')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="flex justify-between items-center mb-8">
        <div>
            <a href="{{ route('dashboard') }}" class="inline-flex items-center text-pink-600 hover:text-pink-800 mb-2">
                <i class="fas fa-arrow-left mr-2"></i> Back to Dashboard
            </a>
            <h1 class="text-3xl font-bold text-pink-600">My Tasks</h1>
        </div>
        <a href="{{ route('tasks.create') }}" class="btn-pink">
            <i class="fas fa-plus mr-2"></i>New Task
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        @foreach($tasks as $task)
        <div class="task-card bg-white rounded-lg p-4 mb-4 shadow hover:shadow-md transition-shadow duration-200">
            <div class="flex justify-between items-start">
                <div class="flex-1">
                    <h3 class="font-bold text-lg {{ $task->is_completed ? 'line-through text-gray-400' : 'text-gray-800' }}">
                        {{ $task->title }}
                    </h3>
                    <p class="text-gray-600 mt-1">{{ $task->description }}</p>

                    <div class="mt-3 flex items-center space-x-4">
                        <!-- Status Badge -->
                        <span class="status-badge px-3 py-1 rounded-full text-xs font-medium
                            @if($task->status == 'completed') bg-green-100 text-green-800
                            @elseif($task->status == 'in_progress') bg-yellow-100 text-yellow-800
                            @else bg-blue-100 text-blue-800
                            @endif">
                            {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                        </span>

                        <!-- Due Date -->
                        @if($task->due_date)
                        <span class="text-sm text-gray-500">
                            <i class="far fa-calendar-alt mr-1"></i>
                            {{ \Carbon\Carbon::parse($task->due_date)->format('M d, Y') }}
                        </span>
                        @endif
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex space-x-2">
                    <!-- Toggle Complete Button -->
                    <form action="{{ route('tasks.toggle-complete', $task->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="p-2 text-gray-500 hover:text-green-500 transition-colors duration-200">
                            @if($task->is_completed)
                                <i class="fas fa-check-circle text-green-500 text-lg"></i>
                            @else
                                <i class="far fa-check-circle text-lg"></i>
                            @endif
                        </button>
                    </form>

                    <!-- Edit Button -->
                    <a href="{{ route('tasks.edit', $task->id) }}" class="p-2 text-blue-500 hover:text-blue-700 transition-colors duration-200">
                        <i class="fas fa-edit"></i>
                    </a>

                    <!-- Delete Button -->
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-2 text-red-500 hover:text-red-700 transition-colors duration-200" onclick="return confirm('Are you sure you want to delete this task?')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
