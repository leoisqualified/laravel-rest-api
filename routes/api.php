<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;


// Controllers
use App\Http\Controllers\AuthorController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('author', AuthorController::class);
    Route::get('author/search/{term}', [AuthorController::class, 'search']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::apiResource('book', BookController::class);
});

Route::post('/login', [AuthController::class, 'login']);
