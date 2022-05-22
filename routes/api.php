<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\UserController;
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

Route::post('/createTournament', [TournamentController::class, 'store'] );

Route::post('/registerGame', [GameController::class, 'store']);

Route::post('/register', [UserController::class, 'store']);

Route::post('/joinTournament', [TournamentController::class, 'update']);

Route::get('/ranking', [TournamentController::class, 'show']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
