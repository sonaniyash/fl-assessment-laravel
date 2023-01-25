<?php

use App\Http\Controllers\CityController;
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

// TODO: Add cities route group
Route::get('/', [CityController::class, 'index'])->name('get.city.index');
Route::get('/create', [CityController::class, 'create'])->name('get.city.create');
Route::post('/store', [CityController::class, 'store'])->name('post.city.store');
Route::get('/show/{id}', [CityController::class, 'show'])->name('get.city.show');
