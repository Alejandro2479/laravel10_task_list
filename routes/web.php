<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Task;

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

Route::get('/tasks/{id}', function ($id) {
    return view('tasks.show', ['task' => Task::findOrFail($id)]);
})->name('tasks.show');

Route::post('/tasks', function (Request $request) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required'
    ]);

    $task = new Task;
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save();

    return redirect()->route('tasks.show', ['id' => $task->id])->with('success', 'Task created successfully');
})->name('taks.store');

Route::fallback(function () {
    return abort(404);
});
