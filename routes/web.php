<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [GameController::class, 'index'])
    ->name('index');
Route::get('users', [UserController::class, 'index'])
    ->name('users.index')
    ->middleware(['auth', 'is.admin']);
Route::get('users/{id}', [UserController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name('users.show');
Route::get('games', [GameController::class, 'index'])
    ->name('games.index');
Route::get('games/{game:slug}', [GameController::class, 'show'])
    ->name('games.show');

Route::post('/profile', [ProfileController::class, 'destroy'])
    ->middleware(['auth', 'verified'])
    ->name('profile.destroy');

require __DIR__.'/auth.php';
