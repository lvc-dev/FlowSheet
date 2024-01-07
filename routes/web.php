<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
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
    Route::delete('/logout', 'logout')->name('logout');
});

/* Routes des projets */

Route::prefix('/project')->name('project.')->controller(ProjectController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/new', 'create')->name('create')->middleware('auth');
    Route::post('/new', 'store')->middleware('auth');
    Route::get('/{project}/edit', 'edit')->name('edit')->middleware('auth');
    Route::patch('/{project}/edit', 'update')->middleware('auth');
    Route::get('/{slug}/{project}', 'show')->where([
        'project' => '[0-9]+',
        'slug' => '[a-z0-9\-]+'
    ])->name('show');
});
