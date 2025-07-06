<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
public function dashboard()
{
    // Pastikan user sudah login
    if (!auth()->check()) {
        return redirect()->route('login');
    }

    $user = auth()->user();
    $tasks = Task::where('user_id', $user->id)
                ->orderBy('is_completed')
                ->orderBy('due_date', 'asc')
                ->get();

    return view('dashboard', [
        'tasks' => $tasks,
        'user' => $user
    ]);
    }

    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())
                    ->orderBy('is_completed')
                    ->orderBy('due_date', 'asc')
                    ->get();

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create', [
            'priorities' => ['low', 'medium', 'high']
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date|after_or_equal:today',
            'priority' => 'required|in:low,medium,high'
        ]);

        Task::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'due_date' => $validated['due_date'],
            'priority' => $validated['priority'],
            'is_completed' => false,
            'user_id' => Auth::id()
        ]);

        return redirect()->route('tasks.index')
                        ->with('success', 'Task created successfully.');
    }

    public function show(Task $task)
    {
        $this->authorize('view', $task);
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        $this->authorize('update', $task);

        return view('tasks.edit', [
            'task' => $task,
            'priorities' => ['low', 'medium', 'high'],
            'statuses' => ['pending', 'in_progress', 'completed']
        ]);
    }

    public function update(Request $request, Task $task)
    {
        $this->authorize('update', $task);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'priority' => 'required|in:low,medium,high',
            'status' => 'required|in:pending,in_progress,completed',
            'is_completed' => 'boolean'
        ]);

        $task->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'due_date' => $validated['due_date'],
            'priority' => $validated['priority'],
            'status' => $validated['status'],
            'is_completed' => $validated['is_completed'] ?? false
        ]);

        return redirect()->route('tasks.index')
                        ->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);

        $task->delete();

        return redirect()->route('tasks.index')
                        ->with('success', 'Task deleted successfully.');
    }

    public function toggleComplete(Task $task)
    {
        $this->authorize('update', $task);

        $task->update([
            'is_completed' => !$task->is_completed,
            'status' => $task->is_completed ? 'in_progress' : 'completed'
        ]);

        return back()->with('success', 'Task status updated.');
    }
}
