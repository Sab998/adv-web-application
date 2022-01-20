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

Route::get('auth/github/redirect',[\App\Http\Controllers\Auth\GithubController::class, 'redirect'])->name('github.redirect');
Route::get('auth/github/callback',[\App\Http\Controllers\Auth\GithubController::class, 'callback'])->name('github.callback');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/welcome', function () {
        return view('welcome');
    });
    Route::get('/', [\App\Http\Controllers\TasksController::class, 'index'])->name('index');
    Route::resource('tasks', \App\Http\Controllers\TasksController::class);

    Route::resource('users', \App\Http\Controllers\UsersController::class);
});
