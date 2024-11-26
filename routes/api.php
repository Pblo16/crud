<?php

use App\Http\Controllers\API\CoordinateController;
use App\Http\Controllers\API\PersonalDataController;
use App\Http\Controllers\API\TestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('test', TestController::class);

Route::apiResource('coordinates', CoordinateController::class);

Route::apiResource('personals', PersonalDataController::class);