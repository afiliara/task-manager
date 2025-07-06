<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// Redirect root ke login
Route::get('/', function () {
    return redirect('/login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [TaskController::class, 'dashboard'])->name('dashboard');
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::resource('tasks', TaskController::class);

});

// Route untuk guest
Route::get('/', function () {
    return view('welcome');
});

Route::patch('/tasks/{task}/toggle-complete', [TaskController::class, 'toggleComplete'])
    ->name('tasks.toggle-complete')
    ->middleware('auth');

    Route::redirect('/', '/dashboard');

// Auth routes
require __DIR__.'/auth.php';
