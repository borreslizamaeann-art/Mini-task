@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow max-w-lg mx-auto">
    <h2 class="text-2xl font-bold mb-4">Edit Task</h2>

    <form action="/tasks/{{ $task->id }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-semibold mb-1">Task Name *</label>
            <input type="text" name="task_name" value="{{ $task->task_name }}" required class="w-full border p-2 rounded focus:outline-blue-500">
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Description</label>
            <textarea name="description" rows="3" class="w-full border p-2 rounded focus:outline-blue-500">{{ $task->description }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Status</label>
            <select name="status" class="w-full border p-2 rounded focus:outline-blue-500">
                <option value="Pending" {{ $task->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Completed" {{ $task->status === 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Due Date</label>
            <input type="date" name="due_date" value="{{ $task->due_date }}" class="w-full border p-2 rounded focus:outline-blue-500">
        </div>

        <div class="flex gap-2">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update Task</button>
            <a href="/tasks" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">Cancel</a>
        </div>
    </form>
</div>
@endsection