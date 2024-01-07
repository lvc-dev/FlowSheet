<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Routes générales de l'application */

Route::get('/', [AppController::class, 'home'])->name('home');

/* Routes de l'authentification */

Route::prefix('/auth')->name('auth.')->controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'doLogin');
    Route::get('/logout', 'logout')->name('logout');
});
