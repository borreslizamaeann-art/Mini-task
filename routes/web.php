<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// Redirect home page to task list
Route::get('/', function () {
    return redirect()->route('tasks.index');
});

// Resource routes for CRUD actions
Route::resource('tasks', TaskController::class);

// Direct route for status updates
Route::patch('/tasks/{task}/toggle', [TaskController::class, 'toggleStatus'])->name('tasks.toggle');