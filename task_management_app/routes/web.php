<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', [TaskController::class, 'index']);

Route::resource('tasks', TaskController::class);
Route::patch('/tasks/{id}/toggle-status', [TaskController::class, 'toggleStatus'])->name('tasks.toggleStatus');
