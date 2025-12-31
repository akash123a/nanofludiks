<?php

use App\Http\Controllers\Api\BlogApiController;
use App\Http\Controllers\Api\SliderApiController;
use App\Http\Controllers\Api\HomeApiController;

Route::get('/blogs', [BlogApiController::class, 'index']);
Route::get('/sliders', [SliderApiController::class, 'index']);
Route::get('/homesection', [HomeApiController::class, 'index']);
Route::get('/test', function () {
    return response()->json(['message' => 'API working']);
});