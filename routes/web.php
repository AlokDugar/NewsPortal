<?php

use App\Http\Controllers\auth\AdminLoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest:admin')->group(function () {
    Route::get('/adminlogin', [AdminLoginController::class, 'showLoginForm'])->name('auth.adminLogin');
    Route::post('/adminlogin', [AdminLoginController::class, 'login']);
});
