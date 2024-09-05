<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\SubtaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects', [ProjectController::class, 'store'])->name('project.store');
    Route::get('/project/{project}', [ProjectController::class, 'show'])->name('project.show');
    Route::get('/project/edit/{project}', [ProjectController::class, 'edit'])->name('project.edit');
    Route::patch('/project/{project}', [ProjectController::class, 'update'])->name('project.update');
    Route::delete('/project/{project}', [ProjectController::class, 'destroy'])->name('project.destroy');

    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/project/{projectId}/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/project/{projectId}/tasks/create', [TaskController::class, 'store'])->name('task.store');
    Route::get('/task/{task}', [TaskController::class, 'show'])->name('task.show');
    Route::get('task/edit/{task}', [TaskController::class, 'edit'])->name('task.edit');
    Route::patch('/task/edit/{task}', [TaskController::class, 'update'])->name('task.update');
    Route::delete('/task/delete/{task}', [TaskController::class, 'destroy'])->name('task.delete');

    Route::get('/tasks/{task}/subtask/create', [SubtaskController::class, 'create'])->name('subtasks.create');
    Route::post('/tasks/{task}/subtask/create', [SubtaskController::class, 'store'])->name('subtask.store');
    Route::get('/tasks/subtask/edit/{subtask}', [SubtaskController::class, 'edit'])->name('subtasks.edit');
    Route::patch('/tasks/subtask/edit/{subtask}', [SubtaskController::class, 'update'])->name('subtask.update');
    Route::delete('/tasks/subtask/delete/{subtask}', [SubtaskController::class, 'destroy'])->name('subtask.destroy');
});

require __DIR__ . '/auth.php';
