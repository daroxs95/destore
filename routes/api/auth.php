<?php

use App\Http\Controllers\API\Auth\AuthenticatedSessionControllerAPI;
use App\Http\Controllers\API\Auth\EmailVerificationNotificationControllerAPI;
use App\Http\Controllers\API\Auth\NewPasswordControllerAPI;
use App\Http\Controllers\API\Auth\PasswordResetLinkControllerAPI;
use App\Http\Controllers\API\Auth\RegisteredUserControllerAPI;
use App\Http\Controllers\API\Auth\VerifyEmailControllerAPI;
use Illuminate\Support\Facades\Route;

Route::post('/register', [RegisteredUserControllerAPI::class, 'store'])
//    ->middleware('guest')
    ->name('api.register');

Route::post('/login', [AuthenticatedSessionControllerAPI::class, 'store'])
    ->middleware('guest')
    ->name('api.login');

Route::post('/forgot-password', [PasswordResetLinkControllerAPI::class, 'store'])
    ->middleware('guest')
    ->name('api.password.email');

Route::post('/reset-password', [NewPasswordControllerAPI::class, 'store'])
    ->middleware('guest')
    ->name('api.password.store');

Route::get('/verify-email/{id}/{hash}', VerifyEmailControllerAPI::class)
    ->middleware(['auth', 'signed', 'throttle:6,1'])
    ->name('api.verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationControllerAPI::class, 'store'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('api.verification.send');

Route::post('/logout', [AuthenticatedSessionControllerAPI::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');
