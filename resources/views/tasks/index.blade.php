@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold">Task List</h2>
    <a href="/tasks/create" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
        + Add Task
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-gray-200 text-gray-700">
                <th class="p-3">Task Name</th>
                <th class="p-3">Description</th>
                <th class="p-3">Due Date</th>
                <th class="p-3">Status</th>
                <th class="p-3 text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tasks as $task)
                <tr class="border-t hover:bg-gray-50">
                    <td class="p-3 font-semibold">{{ $task->task_name }}</td>
                    <td class="p-3 text-gray-600">{{ $task->description ?? 'N/A' }}</td>
                    <td class="p-3">{{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('M d, Y') : 'No Deadline' }}</td>
                    <td class="p-3">
                        <form action="/tasks/{{ $task->id }}/toggle" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="px-3 py-1 rounded text-xs font-bold {{ $task->status === 'Completed' ? 'bg-green-200 text-green-800' : 'bg-yellow-200 text-yellow-800' }}">
                                {{ $task->status }}
                            </button>
                        </form>
                    </td>
                    <td class="p-3 text-center flex justify-center gap-2">
                        <a href="/tasks/{{ $task->id }}/edit" class="bg-gray-500 hover:bg-gray-600 text-white px-3 py-1 rounded text-sm">Edit</a>
                        <form action="/tasks/{{ $task->id }}" method="POST" onsubmit="return confirm('Delete this task?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="p-4 text-center text-gray-500">No tasks found. Click "Add Task" to get started!</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection