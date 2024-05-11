<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MotoController;

Route::get('/', function () {
    return response()->json(['Sucesso' => true]);
});

Route::get('/motos', [MotoController::class, 'index']);
Route::get('/motos/{id}', [MotoController::class, 'show']);
Route::post('/motos', [MotoController::class, 'store']);
Route::put('/motos/{id}', [MotoController::class, 'update']);
Route::delete('/motos/{id}', [MotoController::class, 'destroy']);
