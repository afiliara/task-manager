<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('tasks.update', $task->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-sm font-bold">Title *</label>
                        <input type="text" name="title" value="{{ $task->title }}" required class="w-full border p-2 rounded">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-bold">Description</label>
                        <textarea name="description" rows="4" class="w-full border p-2 rounded">{{ $task->description }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-bold">Due Date</label>
                        <input type="date" name="due_date" value="{{ $task->due_date }}" class="w-full border p-2 rounded">
                    </div>

                    <div class="mb-4">
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="is_completed" class="form-checkbox text-green-500" {{ $task->is_completed ? 'checked' : '' }}>
                            <span class="ml-2">Mark as Completed</span>
                        </label>
                    </div>

                    <div class="flex justify-between items-center">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
                        <a href="{{ route('tasks.index') }}" class="text-blue-500 hover:underline">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
