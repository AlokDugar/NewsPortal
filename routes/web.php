<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminForgotController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminResetController;
use App\Http\Middleware\AdminAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware(AdminAuth::class);
Route::get('/profile', function () {
    return view('profile');
})->name('profile')->middleware(AdminAuth::class);
Route::post('/admin/update-password', [AdminController::class, 'updatePassword'])->name('admin.updatePassword');
Route::post('/admin/update-details', [AdminController::class, 'updateDetails'])->name('admin.updateDetails');

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
