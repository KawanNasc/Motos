<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use App\Http\Controllers\MotoController;

Route::get('/', function() { return response()->json(['Sucesso' => true]); });

Route::get('/motos', [MotoController::class, 'index']);

Route::post('/cadastroMotos', [MotoController::class, 'store']);
