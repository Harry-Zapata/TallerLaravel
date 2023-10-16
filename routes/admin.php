<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\automovilController;
use App\Http\Controllers\PropietarioController;


Route::get('', [HomeController::class, 'index']);
Route::prefix('propietario')->group(function () {
    Route::get('/', [PropietarioController::class, 'home']);
    Route::get('/add', [PropietarioController::class, 'vistaadd']);
    Route::post('/insert', [PropietarioController::class, 'add']);
    Route::get('borrar/{id}', [PropietarioController::class, 'delete']);
    Route::get('edit/{id}', [PropietarioController::class, 'update']);
    Route::post('update/{id}', [PropietarioController::class, 'edit']);
    Route::get('read/{id}', [PropietarioController::class, 'read']);
});

Route::prefix('automovil')->group(function () {
    Route::get('/', [automovilController::class, 'home']);
    Route::get('/add', [automovilController::class, 'vistaadd']);
    Route::post('/insert', [automovilController::class, 'add']);
    Route::get('borrar/{id}', [automovilController::class, 'delete']);
    Route::get('edit/{id}', [automovilController::class, 'update']);
    Route::post('update/{id}', [automovilController::class, 'edit']);
    Route::get('read/{id}', [automovilController::class, 'read']);
});
