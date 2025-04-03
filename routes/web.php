<?php

use App\Http\Controllers\AdvertisementTypeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsCategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    Route::get('/',[HomeController::class,'index'])->name('home');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/admin/check-old-password', [ProfileController::class, 'checkOldPassword'])->name('profile.checkOldPassword');

    Route::resource('categories',NewsCategoryController::class);
    Route::resource('types',TypeController::class);
    Route::resource('ads',AdvertisementController::class);
    Route::resource('adTypes',AdvertisementTypeController::class);
    Route::resource('news',NewsController::class);

    Route::post('/categories-update-status',[NewsCategoryController::class,'updateStatus'])->name('categories.updateStatus');
    Route::post('/ads-update-status',[AdvertisementController::class,'updateStatus'])->name('ads.updateStatus');
    Route::post('/news-update-status',[NewsController::class,'updateStatus'])->name('news.updateStatus');

    Route::post('/news/upload-image', [NewsController::class,'upload'])->name('news.upload');
    Route::get('/news-create', [NewsController::class,'create'])->name('news.create');
    Route::get('/news-edit', [NewsController::class,'edit'])->name('news.edit');

    Route::get('/settings',[SettingsController::class,'index'])->name('settings');
    Route::post('/settings', [SettingsController::class, 'update'])->name('settings.update');
});

require __DIR__.'/auth.php';
