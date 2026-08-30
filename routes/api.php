<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\LaguController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/lagu', [LaguController::class, 'index']);
Route::post('/lagu', [LaguController::class, 'store'])->middleware(['auth:sanctum', 'admin']);
Route::delete('/lagu/{id}', [LaguController::class, 'destroy'])->middleware(['auth:sanctum', 'admin']);