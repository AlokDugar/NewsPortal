<?php

use App\Http\Controllers\AdminForgotController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Middleware\AdminAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware(AdminAuth::class);

Route::middleware('guest:admin')->group(function () {
    Route::get('/adminlogin', [AdminLoginController::class, 'showLoginForm'])->name('auth.adminLogin');
    Route::post('/adminlogin', [AdminLoginController::class, 'login']);
    Route::get('/adminforgot-password', [AdminForgotController::class, 'showLinkRequestForm'])->name('password.adminRequest');
    Route::post('/adminforgot-password', [AdminForgotController::class, 'sendResetLink'])->name('password.adminEmail');
});

Route::post('/adminlogout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/adminlogin')->with('success', 'You have been logged out!');
})->name('auth.adminLogout')->middleware(AdminAuth::class);
