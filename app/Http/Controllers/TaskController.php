<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // View Tasks
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'desc')->get();
        return view('tasks.index', compact('tasks'));
    }

    // Add Task (Show form)
    public function create()
    {
        return view('tasks.create');
    }

    // Add Task (Save to DB)
    public function store(Request $request)
    {
        $request->validate([
            'task_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
        ]);

        Task::create([
            'task_name' => $request->task_name,
            'description' => $request->description,
            'status' => 'Pending',
            'due_date' => $request->due_date,
        ]);

        return redirect('/tasks')->with('success', 'Task added successfully.');
    }

    // Edit Task (Show form)
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    // Edit Task (Update DB)
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'task_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:Pending,Completed',
            'due_date' => 'nullable|date',
        ]);

        $task->update($request->all());

        return redirect('/tasks')->with('success', 'Task updated successfully.');
    }

    // Update Status directly (Pending <-> Completed toggle)
    public function toggleStatus(Task $task)
    {
        $task->status = $task->status === 'Pending' ? 'Completed' : 'Pending';
        $task->save();

        return redirect('/tasks')->with('success', 'Status updated successfully.');
    }

    // Delete Task
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect('/tasks')->with('success', 'Task deleted successfully.');
    }
}