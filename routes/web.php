<?php

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

// Dice game routes
Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::get('/dice', 'App\Http\Controllers\Dice\GetDiceGame@index');
Route::post('/dice', 'App\Http\Controllers\Dice\PostDiceGame@index');
Route::get('/dice/play', 'App\Http\Controllers\Dice\GetDiceGamePlay@index');
Route::post('/dice/play', 'App\Http\Controllers\Dice\PostDiceGamePlay@index');
Route::post('/dice/computerplay', 'App\Http\Controllers\Dice\PostDiceGameComputerPlay@index');
Route::get('/dice/results', 'App\Http\Controllers\Dice\GetDiceGameResults@index');

// Roll dices routes
Route::get('/rolldices', 'App\Http\Controllers\RollDices\RollDices@get');
Route::post('/rolldices', 'App\Http\Controllers\RollDices\RollDices@post');
