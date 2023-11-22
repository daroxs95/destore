<?php

use App\Http\Controllers\API\GameControllerAPI;
use App\Http\Controllers\API\TagControllerAPI;
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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

// Disabled APIs for now
//Route::resource('tags', TagControllerAPI::class);
//Route::resource('games', GameControllerAPI::class);

//require __DIR__.'/api/auth.php';
