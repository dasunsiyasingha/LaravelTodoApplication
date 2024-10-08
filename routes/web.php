<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodoController;

use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'GotoHome'])->name('home');


Route::prefix('/todo')->group( function () {
    Route::get('/', [TodoController::class, 'GotoTodo'])->name('todo');
    Route::post('/addtask', [TodoController::class, 'addTask'])->name('addtask');
    Route::get('/{task_id}/delete', [TodoController::class, 'delete'])->name('task.delete');
    Route::get('/{task_id}/change', [TodoController::class, 'statusChange'])->name('task.statusChange');
    // Route::post('/{task_id}/edit', [])

});

