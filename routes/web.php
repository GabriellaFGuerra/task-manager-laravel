<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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

    Route::get('/project/{projectId}/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/project/{projectId}/tasks/create', [TaskController::class, 'store'])->name('task.store');
    Route::get('/task/{task}', [TaskController::class, 'show'])->name('task.show');
    Route::get('task/edit/{task}', [TaskController::class, 'edit'])->name('task.edit');
    Route::patch('/task/edit/{task}', [TaskController::class, 'update'])->name('task.update');
    Route::get('/task/delete/{task}', [TaskController::class, 'destroy'])->name('task.delete');
});

require __DIR__ . '/auth.php';
