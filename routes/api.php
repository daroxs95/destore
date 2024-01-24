<?php

use App\Http\Controllers\API\GameController;
use App\Http\Controllers\API\TagController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::apiResource('tags', TagController::class);

    Route::get('games', [GameController::class, 'index'])
        ->name('api.games.index');
    Route::get('games/{game:slug}', [GameController::class, 'show'])
        ->name('api.games.show');
    Route::post('games', [GameController::class, 'store'])
        ->name('api.games.store');
    Route::put('games/{game:slug}', [GameController::class, 'update'])
        ->name('api.games.update');
    Route::delete('games/{game:slug}', [GameController::class, 'destroy'])
        ->name('api.games.destroy');
});
