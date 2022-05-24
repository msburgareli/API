<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GameController;
use App\Http\Controllers\Api\TournamentController;
use App\Http\Controllers\Api\UserController;
use App\Http\Middleware\isAdmin;
use App\Http\Controllers\Auth\RegisterController;


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

Route::middleware('auth:sanctum')->group(function () {
    // Allow user to see the list of games or a specific game using a filter
    Route::get('/game', [UserController::class, 'index']);
    Route::get('/game/{id}', [UserController::class, 'show']);

    // Allow user to see a list of avaible tournaments or a specific tournament using a filter
    Route::get('/tournament', [UserController::class, 'index']);
    Route::get('/tournament/{id}', [UserController::class, 'show']);

    //Allow user to join tournaments and see the scores / leaderboard
    Route::get('/score', [UserController::class, 'index']);
    Route::get('/score/{id}', [UserController::class, 'show']);
    Route::post('/score', [UserController::class, 'store']);
    Route::put('/score', [UserController::class, 'update']);
});


Route::controller(RegisterController::class)->group(function(){
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});

























Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);

Route::group(['middleware' => 'isAdmin'], function () {
    
    Route::post('/game', [UserController::class, 'store']);
    Route::put('/game/{id}', [UserController::class, 'update']);
    Route::delete('/game/{id}', [UserController::class, 'destroy']);

    
    Route::post('/tournament', [UserController::class, 'store']);
    Route::put('/tournament/{id}', [UserController::class, 'update']);
    Route::delete('/tournament/{id}', [UserController::class, 'destroy']);
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });