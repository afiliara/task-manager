@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-pink-600">Task Dashboard</h1>
        <a href="{{ route('tasks.create') }}" class="btn-pink bg-pink-500 hover:bg-pink-600 text-white font-bold py-2 px-6 rounded-full">
            <i class="fas fa-plus mr-2"></i>New Task
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Task Stats -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <h2 class="text-xl font-bold text-pink-600 mb-4">Tasks Overview</h2>
            <div class="space-y-4">
                <div class="flex justify-between items-center">
                    <span>Total Tasks</span>
                    <span class="font-bold text-pink-600">{{ $tasks->count() }}</span>
                </div>
                <div class="flex justify-between items-center">
                    <span>Completed</span>
                    <span class="font-bold text-green-500">{{ $tasks->where('status', 'completed')->count() }}</span>
                </div>
                <div class="flex justify-between items-center">
                    <span>In Progress</span>
                    <span class="font-bold text-yellow-500">{{ $tasks->where('status', 'in_progress')->count() }}</span>
                </div>
                <div class="flex justify-between items-center">
                    <span>Pending</span>
                    <span class="font-bold text-blue-500">{{ $tasks->where('status', 'pending')->count() }}</span>
                </div>
            </div>
        </div>

        <!-- Recent Tasks -->
        <div class="bg-white rounded-xl shadow-md p-6 md:col-span-2">
            <h2 class="text-xl font-bold text-pink-600 mb-4">Recent Tasks</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Due Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($tasks->take(5) as $task)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="font-medium text-gray-900">{{ $task->title }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($task->due_date)
                                    {{ \Carbon\Carbon::parse($task->due_date)->format('M d, Y') }}
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs rounded-full
                                    @if($task->status == 'completed') bg-green-100 text-green-800
                                    @elseif($task->status == 'in_progress') bg-yellow-100 text-yellow-800
                                    @else bg-blue-100 text-blue-800
                                    @endif">
                                    {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <a href="{{ route('tasks.edit', $task->id) }}" class="text-blue-600 hover:text-blue-900 mr-3">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                No tasks found. Create your first task!
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- All Tasks -->
        <div class="bg-white rounded-xl shadow-md p-6 md:col-span-3">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-pink-600">All Tasks</h2>
                <div class="flex space-x-2">
                    <input type="text" placeholder="Search tasks..." class="px-4 py-2 border rounded-lg">
                    <select class="px-4 py-2 border rounded-lg">
                        <option>All Status</option>
                        <option>Pending</option>
                        <option>In Progress</option>
                        <option>Completed</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @forelse($tasks as $task)
                <div class="bg-white border border-gray-200 rounded-lg p-4 task-card">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="font-bold text-lg text-gray-800">{{ $task->title }}</h3>
                            <p class="text-gray-600 mt-2">{{ $task->description }}</p>
                        </div>
                        <div class="flex space-x-2">
                            <a href="{{ route('tasks.edit', $task->id) }}" class="text-blue-500 hover:text-blue-700">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Are you sure?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="mt-4 flex justify-between items-center">
                        <span class="text-sm text-gray-500">
                            @if($task->due_date)
                                <i class="far fa-calendar mr-1"></i>
                                {{ \Carbon\Carbon::parse($task->due_date)->format('M d, Y') }}
                            @endif
                        </span>
                        <span class="px-2 py-1 text-xs rounded-full
                            @if($task->status == 'completed') bg-green-100 text-green-800
                            @elseif($task->status == 'in_progress') bg-yellow-100 text-yellow-800
                            @else bg-blue-100 text-blue-800
                            @endif">
                            {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                        </span>
                    </div>
                </div>
                @empty
                <div class="md:col-span-3 text-center py-8">
                    <div class="text-gray-500">
                        You don't have any tasks yet. Create your first task!
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
