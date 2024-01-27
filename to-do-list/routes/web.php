<?php

use App\Http\Controllers\TodolistController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TodolistController::class, 'index']) -> name('index');
Route::get('/', [TodolistController::class, 'index'])->name('home');
Route::post('/', [TodolistController::class, 'store']) -> name('store');
Route::post('/complete/{todolist}', [TodolistController::class, 'complete'])->name('complete');
Route::delete('/{todolist:id}', [TodolistController::class, 'destroy']) -> name('destroy');
Route::get('edit/{todolist}', [TodolistController::class, 'edit']) ->name('edit');
Route::patch('update/{todolist}', [TodolistController::class, 'update']) ->name('update');