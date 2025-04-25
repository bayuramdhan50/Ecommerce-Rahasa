<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'loginForm'])
        ->name('login');

    Route::post('login', [AuthController::class, 'login']);

    Route::get('register', [AuthController::class, 'registerForm'])
        ->name('register');

    Route::post('register', [AuthController::class, 'register']);

    Route::get('forgot-password', [AuthController::class, 'forgotPasswordForm'])
        ->name('password.request');

    Route::post('forgot-password', [AuthController::class, 'forgotPassword'])
        ->name('password.email');

    Route::get('reset-password/{token}', [AuthController::class, 'resetPasswordForm'])
        ->name('password.reset');

    Route::post('reset-password', [AuthController::class, 'resetPassword'])
        ->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])
        ->name('logout');
});
