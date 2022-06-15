<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonController;

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

Route::get('/register', function() {
    return 'Hello World!';
})->name('register');

Route::get('/login', function() {
    return 'Hello World!';
})->name('login');

Route::get('/pokemon', [PokemonController::class, 'index'])->middleware('auth');
