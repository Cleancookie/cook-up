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

Route::get('/', static fn () => view('welcome'));

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', static fn () => view('dashboard') )->name('dashboard');

    Route::get('/recipes', [\App\Http\Controllers\RecipesController::class, 'index'])->name('recipes.index');
    Route::get('/recipes/{recipe}', [\App\Http\Controllers\RecipesController::class, 'show'])->name('recipes.show');
});
