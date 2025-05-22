<?php

use App\Http\Controllers\GamesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/get-csrf-token', function () {
    return response()->json(['_token' => csrf_token()]);
});
Route::get('/games', [GamesController::class,])->name('games.index');
// make the routes for the rest of the actions

Route::get('/games/{id}', [GameController::class, 'show'])->name('games.show');

Route::delete('/games/{id}', [GameController::class, 'destroy'])->name('games.destroy');
