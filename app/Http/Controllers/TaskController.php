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
}
