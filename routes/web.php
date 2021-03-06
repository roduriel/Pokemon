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

Route::get('/', function () {
    return view('pokemons');
});

Route::get('pokepage', function () {
    return view('pokemons');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('chekuser', [App\Http\Controllers\CheckuserController::class, 'Check'])->name('chekuser');
Route::post('favorites', [App\Http\Controllers\FavoriteController::class, 'store'])->middleware(['auth'])->name('favorites');
Route::post('favoritesdel', [App\Http\Controllers\FavoriteController::class, 'destroy'])->middleware(['auth'])->name('favoritesdel');
Route::post('chekfav', [App\Http\Controllers\FavoriteController::class, 'checked'])->name('chekfav');
Route::get('favsindex', [App\Http\Controllers\FavoriteController::class, 'index'])->middleware(['auth'])->name('favsindex');
Route::get('mypokemons', [App\Http\Controllers\FavoriteController::class, 'show'])->middleware(['auth'])->name('mypokemons');

