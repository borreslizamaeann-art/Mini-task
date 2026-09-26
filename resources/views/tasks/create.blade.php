@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow max-w-lg mx-auto">
    <h2 class="text-2xl font-bold mb-4">Add New Task</h2>

    <form action="{{ url('/tasks') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block font-semibold mb-1">Task Name *</label>
            <input type="text" name="task_name" required class="w-full border p-2 rounded focus:outline-blue-500">
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Description</label>
            <textarea name="description" rows="3" class="w-full border p-2 rounded focus:outline-blue-500"></textarea>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Due Date</label>
            <input type="date" name="due_date" class="w-full border p-2 rounded focus:outline-blue-500">
        </div>

        <div class="flex gap-2">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save Task</button>
            <a href="{{ route('tasks.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">Cancel</a>
        </div>
    </form>
</div>
@endsection