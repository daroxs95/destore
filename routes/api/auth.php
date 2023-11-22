<?php

use App\Http\Controllers\API\Auth\AuthenticatedSessionControllerAPI;
use App\Http\Controllers\API\Auth\RegisteredUserControllerAPI;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [RegisteredUserControllerAPI::class, 'store'])
//    ->middleware('guest')
    ->name('api.register');

Route::post('/login', [AuthenticatedSessionControllerAPI::class, 'store'])
    ->middleware('guest')
    ->name('api.login');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('api.password.email');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('api.password.store');

Route::get('/verify-email/{id}/{hash}', VerifyEmailController::class)
    ->middleware(['auth', 'signed', 'throttle:6,1'])
    ->name('api.verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('api.verification.send');

Route::post('/logout', [AuthenticatedSessionControllerAPI::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');
