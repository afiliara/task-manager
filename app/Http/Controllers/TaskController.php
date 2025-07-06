<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->get();
        return view('tasks.index', compact('tasks'));
    }

    public function dashboard()
    {
        $tasks = Task::where('user_id', Auth::id())
                    ->orderBy('is_completed')
                    ->orderBy('due_date', 'asc')
                    ->get();

        $stats = [
            'total' => $tasks->count(),
            'completed' => $tasks->where('status', 'completed')->count(),
            'in_progress' => $tasks->where('status', 'in_progress')->count(),
            'pending' => $tasks->where('status', 'pending')->count()
        ];

        return view('dashboard', [
            'tasks' => $tasks,
            'stats' => $stats,
            'recentTasks' => $tasks->take(3)
        ]);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'due_date' => 'nullable|date'
            // Hapus validasi status
        ]);

        Task::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'due_date' => $validated['due_date'],
            'is_completed' => $request->has('is_completed'), // Gunakan ini
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('tasks.index');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

public function update(Request $request, Task $task)
{
    $request->validate([
        'title' => 'required',
        'description' => 'nullable',
        'due_date' => 'nullable|date',
        'status' => 'required|in:pending,in_progress,completed'
    ]);

    $task->update([
        'title' => $request->title,
        'description' => $request->description,
        'due_date' => $request->due_date,
        'is_completed' => $request->has('is_completed'),
        'status' => $request->status
    ]);

    return redirect()->route('tasks.index')->with('success', 'Task updated.');
}

public function destroy(Task $task)
{
    $task->delete();
    return redirect()->route('tasks.index')->with('success', 'Task deleted.');
}

    public function toggleComplete(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        // Pastikan task milik user yang sedang login
        if ($task->user_id !== Auth::id()) {
            abort(403);
        }

        // Toggle status is_completed dan update status
        $task->update([
            'is_completed' => !$task->is_completed,
            'status' => !$task->is_completed ? 'completed' : 'pending'
        ]);

        return back()->with('success', 'Task status updated.');
    }
}
