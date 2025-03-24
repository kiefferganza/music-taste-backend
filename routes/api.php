<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::get('albums', [\App\Http\Controllers\AlbumController::class,'index']);
    Route::post('/album/{album}/vote', [\App\Http\Controllers\VoteController::class, 'store']);
    Route::delete('/album/{album}', [\App\Http\Controllers\AlbumController::class, 'destroy'])->middleware('can:delete,album');
});
