<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('tasks.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="title" class="block text-sm font-bold">Title *</label>
                        <input type="text" name="title" required class="w-full border p-2 rounded">
                        @error('title') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-sm font-bold">Description</label>
                        <textarea name="description" rows="4" class="w-full border p-2 rounded"></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="due_date" class="block text-sm font-bold">Due Date</label>
                        <input type="date" name="due_date" class="w-full border p-2 rounded">
                    </div>

                    <div class="mb-4">
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="is_completed" class="form-checkbox text-green-500">
                            <span class="ml-2">Mark as Completed</span>
                        </label>
                    </div>

                    <div class="flex justify-between items-center">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
                        <a href="{{ route('tasks.index') }}" class="text-blue-500 hover:underline">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
