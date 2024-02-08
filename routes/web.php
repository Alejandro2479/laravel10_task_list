<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Requests\TaskRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/tasks", function () {
    return view('tasks.home', ['tasks' => Task::latest()->get()]);
})->name('tasks.home');

Route::get("/", function () {
    return redirect()->route('tasks.home');
});

Route::view('/tasks/create', 'tasks.create');

Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('tasks.edit', ['task' => $task]);
})->name('tasks.edit');

Route::get('/tasks/{task}', function (Task $task) {
    return view('tasks.show', ['task' => $task]);
})->name('tasks.show');

Route::post('/tasks', function (TaskRequest $taskRequest) {
    $task = Task::create($taskRequest->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])->with('success', 'Task created successfully');
})->name('taks.store');

Route::put('/tasks/{task}', function (Task $task, TaskRequest $taskRequest) {
    $task->update($taskRequest->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])->with('success', 'Task updated successfully');
})->name('tasks.update');

Route::fallback(function () {
    return abort(404);
});
