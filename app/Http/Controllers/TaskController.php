<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    public function indexTask()
    {
        return view('tasks.index', ['tasks' => Task::latest()->paginate(10)]);
    }

    public function createTask()
    {
        return view('tasks.create');
    }

    public function editTask(Task $task)
    {
        return view('tasks.edit', ['task' => $task]);
    }

    public function showTask(Task $task)
    {
        return view('tasks.show', ['task' => $task]);
    }

    public function storeTask(TaskRequest $taskRequest)
    {
        $task = Task::create($taskRequest->validated());

        return redirect()->route('tasks.index')->with('success', 'Task created successfully');
    }

    public function updateTask(Task $task, TaskRequest $taskRequest)
    {
        $task->update($taskRequest->validated());

        return redirect()->route('tasks.show', ['task' => $task->id])->with('success', 'Task updated successfully');
    }

    public function deleteTask(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');
    }

    public function toogleCompleteTask(Task $task)
    {
        $task->toggleComplete();

        return redirect()->back()->with('success', 'Task updated successfully');
    }
}
