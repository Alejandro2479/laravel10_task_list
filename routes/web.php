<?php

use Illuminate\Support\Facades\Route;

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
    return view('tasks.home', ['tasks' => \App\Models\Task::latest()->get()]);
})->name('tasks.home');

Route::get("/", function () {
    return redirect()->route('tasks.home');
});

Route::get('/tasks/{id}', function ($id) {
    return view('tasks.show', ['task' => \App\Models\Task::findOrFail($id)]);
})->name('tasks.show');

Route::fallback(function () {
    return abort(404);
});
