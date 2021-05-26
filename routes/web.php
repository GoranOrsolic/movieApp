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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');


Route::get('/movies', [App\Http\Controllers\MoviesController::class, 'index'])->name('movies.index');
Route::get('/movies/page/{page?}', [App\Http\Controllers\MoviesController::class, 'index']);

Route::get('/movies/nowPlay', [App\Http\Controllers\MoviesController::class, 'nowPlay'])->name('movies.nowPlay');
Route::get('/movies/nowPlay/page/{page?}', [App\Http\Controllers\MoviesController::class, 'nowPlay']);

Route::get('/movies/{id}', [App\Http\Controllers\MoviesController::class, 'show'])->name('movies.show');

Route::get('/tv', [App\Http\Controllers\TvController::class, 'index'])->name('tv.index');
Route::get('/tv/page/{page?}', [App\Http\Controllers\TvController::class, 'index']);

Route::get('/tv/TopRatedTV', [App\Http\Controllers\TvController::class, 'topTv'])->name('tv.TopRatedTV');
Route::get('/tv/TopRatedTV/page/{page?}', [App\Http\Controllers\TvController::class, 'topTv']);

Route::get('/tv/{id}', [App\Http\Controllers\TvController::class, 'show'])->name('tv.show');

Route::get('/actors', [App\Http\Controllers\ActorsController::class, 'index'])->name('actors.index');
Route::get('/actors/page/{page?}', [App\Http\Controllers\ActorsController::class, 'index']);

Route::get('/actors/{id}', [App\Http\Controllers\ActorsController::class, 'show'])->name('actors.show');



