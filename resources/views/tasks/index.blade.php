<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Task List') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('tasks.create') }}" class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block">+ New Task</a>

        <ul class="space-y-4">
            @foreach ($tasks as $task)
                <li class="bg-white p-4 shadow rounded">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="text-lg font-bold {{ $task->is_completed ? 'line-through text-gray-400' : '' }}">
                                {{ $task->title }}
                            </h3>
                            <div class="text-sm mt-1">
                                @if ($task->due_date)
                                    <span class="{{ \Carbon\Carbon::parse($task->due_date)->isPast() && !$task->is_completed ? 'text-red-500 font-semibold' : 'text-gray-500' }}">
                                        Due: {{ \Carbon\Carbon::parse($task->due_date)->format('d M Y') }}
                                    </span>
                                @endif
                            </div>
                            <span class="text-xs px-2 py-1 rounded
                                {{ $task->is_completed ? 'bg-green-200 text-green-800' : 'bg-gray-200 text-gray-600' }}">
                                {{ $task->is_completed ? 'Selesai' : 'Belum Selesai' }}
                            </span>
                        </div>
                        <div class="space-x-2">
                            <a href="{{ route('tasks.edit', $task->id) }}" class="text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500 hover:underline">Delete</button>
                            </form>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</x-app-layout>
