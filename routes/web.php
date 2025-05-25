<?php

use App\Http\Controllers\GamesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/get-csrf-token', function () {
    return response()->json(['_token' => csrf_token()]);
});
Route::get('/games', [GamesController::class,'index'])->name('games.index');
// Step 2. make the routes for the rest of the actions
Route::delete('/games/{id}', [GamesController::class, 'destroy'])->name('games.destroy');
Route::get('/games/{id}', [GamesController::class, 'show'])->name('games.show');