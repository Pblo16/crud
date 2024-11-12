<?php

use App\Http\Controllers\API\CoordinateController;
use App\Http\Controllers\API\TestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Add this new route for fetching a specific user by ID
Route::get('test/user/{id}', [TestController::class, 'getUserById']);

Route::apiResource('test', TestController::class);

Route::apiResource('coordinates', CoordinateController::class);
