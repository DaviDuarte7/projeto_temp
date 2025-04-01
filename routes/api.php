<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\TemperatureController;

Route::prefix('v1')->group(function () {
    Route::get('/temperatures', [TemperatureController::class, 'index']);
    Route::post('/temperatures', [TemperatureController::class, 'store']);
});


Route::prefix('v1')->group(function () {
    Route::get('/temperatures', [TemperatureController::class, 'index']);
    Route::post('/temperatures', [TemperatureController::class, 'store']);
});