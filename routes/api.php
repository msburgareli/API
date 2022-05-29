<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GameController;
use App\Http\Controllers\Api\TournamentController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Middleware\isAuthenticated;
use App\Http\Controllers\Api\ScoreController;


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

// Auth routes for users
Route::controller(RegisterController::class)->group(function(){
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});

// User routes
Route::middleware(isAuthenticated::class)->group(function () {
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/{id}', [UserController::class, 'show']);

    // Allow user to see the list of games or a specific game using a filter
    Route::get('/game', [GameController::class, 'index']);
    Route::get('/game/{id}', [GameController::class, 'show']);

    // Allow user to see leaderboard, the list of avaible tournaments or a specific tournament using a filter
    Route::get('/tournament', [TournamentController::class, 'index']);
    Route::get('/tournament/{id}/leaderboard', [TournamentController::class, 'leaderboard']);
    Route::get('/tournament/{id}', [TournamentController::class, 'show']);
    

    //Allow user to join tournaments and see the scores / leaderboard
    Route::get('/score', [ScoreController::class, 'playerScore']);
    Route::post('/score', [ScoreController::class, 'store']);
    Route::put('/score', [ScoreController::class, 'update']);
});

// Admin routes
Route::middleware('auth:api')->group(function () {
    Route::post('/admin/register', [RegisterController::class, 'admin_register']);

    Route::post('/game', [GameController::class, 'store']);
    Route::put('/game/{id}', [GameController::class, 'update']);
    Route::delete('/game/{id}', [GameController::class, 'destroy']);

    
    Route::post('/tournament', [TournamentController::class, 'store']);
    Route::put('/tournament/{id}', [TournamentController::class, 'update']);
    Route::delete('/tournament/{id}', [TournamentController::class, 'destroy']);
});