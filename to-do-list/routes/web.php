<?php

use App\Http\Controllers\TodolistController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TodolistController::class, 'index']) -> name('index');
Route::post('/', [TodolistController::class, 'store']) -> name('store');
Route::post('/complete/{todolist}', [TodolistController::class, 'complete'])->name('complete');
Route::delete('/{todolist:id}', [TodolistController::class, 'destroy']) -> name('destroy');

// Search option 
Route::get('/todolists/search', [TodolistController::class, 'search'])->name('todolists.search');

// Return the view file with the form to update the task.
Route::get('edit/{todolist}', [TodolistController::class, 'edit']) ->name('edit');

// The post route to update the task.
Route::patch('update/{todolist}', [TodolistController::class, 'update']) ->name('update');