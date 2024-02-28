<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    public function index()
    {
        return view('tasks.index', ['tasks' => Task::latest()->paginate(10)]);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', ['task' => $task]);
    }

    public function show(Task $task)
    {
        return view('tasks.show', ['task' => $task]);
    }

    public function store(TaskRequest $taskRequest)
    {
        $task = Task::create($taskRequest->validated());

        return redirect()->route('tasks.show', ['task' => $task->id])->with('success', 'Task created successfully');
    }

    public function update(Task $task, TaskRequest $taskRequest)
    {
        $task->update($taskRequest->validated());

        return redirect()->route('tasks.show', ['task' => $task->id])->with('success', 'Task updated successfully');
    }

    public function delete(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');
    }

    public function toggleComplete(Task $task)
    {
        $task->toggleComplete();

        return redirect()->back()->with('success', 'Task updated successfully');
    }
}
