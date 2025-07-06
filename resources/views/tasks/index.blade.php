<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Task Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold">Your Tasks</h1>
                        <a href="{{ route('tasks.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            + Create New Task
                        </a>
                    </div>

                    @if(session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                        <a href="{{ route('tasks.index') }}" class="bg-gray-100 hover:bg-gray-200 p-4 rounded-lg text-center">
                            <h3 class="text-lg font-semibold">All Tasks</h3>
                            <p class="text-3xl font-bold">{{ $tasks->count() }}</p>
                        </a>
                        <a href="{{ route('tasks.index', ['status' => 'pending']) }}" class="bg-yellow-100 hover:bg-yellow-200 p-4 rounded-lg text-center">
                            <h3 class="text-lg font-semibold">Pending</h3>
                            <p class="text-3xl font-bold">{{ $tasks->where('status', 'pending')->count() }}</p>
                        </a>
                        <a href="{{ route('tasks.index', ['status' => 'in_progress']) }}" class="bg-blue-100 hover:bg-blue-200 p-4 rounded-lg text-center">
                            <h3 class="text-lg font-semibold">In Progress</h3>
                            <p class="text-3xl font-bold">{{ $tasks->where('status', 'in_progress')->count() }}</p>
                        </a>
                        <a href="{{ route('tasks.index', ['status' => 'completed']) }}" class="bg-green-100 hover:bg-green-200 p-4 rounded-lg text-center">
                            <h3 class="text-lg font-semibold">Completed</h3>
                            <p class="text-3xl font-bold">{{ $tasks->where('status', 'completed')->count() }}</p>
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="py-3 px-4 text-left">Title</th>
                                    <th class="py-3 px-4 text-left">Status</th>
                                    <th class="py-3 px-4 text-left">Due Date</th>
                                    <th class="py-3 px-4 text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                @forelse($tasks as $task)
                                    <tr class="{{ $loop->even ? 'bg-gray-50' : '' }}">
                                        <td class="py-3 px-4">{{ $task->title }}</td>
                                        <td class="py-3 px-4">
                                            <span class="px-2 py-1 text-xs rounded-full {{ $task->status_color }}">
                                                {{ $task->status_text }}
                                            </span>
                                        </td>
                                        <td class="py-3 px-4">
                                            {{ $task->formatted_due_date }}
                                        </td>
                                        <td class="py-3 px-4 flex space-x-2">
                                            <a href="{{ route('tasks.show', $task->id) }}" class="text-blue-500 hover:text-blue-700" title="View">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                                </svg>
                                            </a>
                                            <a href="{{ route('tasks.edit', $task->id) }}" class="text-green-500 hover:text-green-700" title="Edit">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                </svg>
                                            </a>
                                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700" title="Delete" onclick="return confirm('Are you sure you want to delete this task?')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="py-4 px-4 text-center">No tasks found. Create your first task!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
