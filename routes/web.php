<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminForgotController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminResetController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\AdvertisementTypeController;
use App\Http\Controllers\NewsCategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TypeController;
use App\Http\Middleware\AdminAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->middleware(AdminAuth::class);

Route::get('/profile', function () {
    return view('profile');
})->name('profile')->middleware(AdminAuth::class);

Route::resource('categories',NewsCategoryController::class)->middleware(AdminAuth::class);
Route::resource('types',TypeController::class)->middleware(AdminAuth::class);
Route::resource('ads',AdvertisementController::class)->middleware(AdminAuth::class);
Route::resource('adTypes',AdvertisementTypeController::class)->middleware(AdminAuth::class);
Route::resource('news',NewsController::class)->middleware(AdminAuth::class);

Route::post('/admin/update-password', [AdminController::class, 'updatePassword'])->name('admin.updatePassword')->middleware(AdminAuth::class);

Route::post('/admin/check-old-password', [AdminController::class, 'checkOldPassword'])->name('admin.checkOldPassword')->middleware(AdminAuth::class);

Route::middleware('guest:admin')->group(function () {
    Route::get('/adminlogin', [AdminLoginController::class, 'showLoginForm'])->name('auth.adminLogin');
    Route::post('/adminlogin', [AdminLoginController::class, 'login']);

    Route::get('/adminforgot-password', [AdminForgotController::class, 'showLinkRequestForm'])->name('password.adminRequest');
    Route::post('/adminforgot-password', [AdminForgotController::class, 'sendResetLink'])->name('password.adminEmail');

    Route::get('/adminreset-password/{token}', [AdminResetController::class, 'showResetForm'])->name('password.adminReset');
    Route::post('/adminreset-password', [AdminResetController::class, 'resetPassword'])->name('password.adminUpdate');
});

Route::post('/adminlogout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/adminlogin')->with('success', 'You have been logged out!');
})->name('auth.adminLogout')->middleware(AdminAuth::class);

Route::post('/categories-update-status',[NewsCategoryController::class,'updateStatus'])->name('categories.updateStatus')->middleware(AdminAuth::class);
Route::post('/ads-update-status',[AdvertisementController::class,'updateStatus'])->name('ads.updateStatus')->middleware(AdminAuth::class);

Route::post('/news/upload-image', [NewsController::class,'upload'])->name('news.upload');
Route::get('/news-dashboard', [NewsController::class,'showDashboard'])->name('news.showDashboard');
Route::get('/news-create', [NewsController::class,'create'])->name('news.create');

