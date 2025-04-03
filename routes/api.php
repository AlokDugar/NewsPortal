<?php

use App\Http\Controllers\Api\V1\Admin\AdvertisementApiController;
use App\Http\Controllers\Api\V1\Admin\NewsApiController;
use App\Http\Controllers\Api\V1\Admin\NewsCategoryApiController;
use App\Http\Controllers\Api\V1\Admin\SettingsApiController;
use App\Http\Controllers\Api\V1\Admin\TypeApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['prefix' => 'v1', 'as' => 'api.'], function () {
    Route::apiResource('news', NewsApiController::class);
    Route::apiResource('newsCategory', NewsCategoryApiController::class);
    Route::apiResource('newsType', TypeApiController::class);
    Route::apiResource('ads', AdvertisementApiController::class);
    Route::apiResource('settings', SettingsApiController::class);
});


