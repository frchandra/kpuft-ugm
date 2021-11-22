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

Route::get('/',  [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/status',  [\App\Http\Controllers\HomeController::class, 'getStatus']);

Route::get('dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->middleware('checkPemilih');

Route::post('dashboard', [\App\Http\Controllers\DashboardController::class, 'store'])->middleware('checkPemilih');

Route::get('auth/google', [App\Http\Controllers\GoogleController::class, 'redirectToGoogle'])->name('google.login');

Route::get('auth/google/callback', [App\Http\Controllers\GoogleController::class, 'handleGoogleCallback'])->name('google.callback');

Route::get('some/ridiculous/routes', [App\Http\Controllers\ResourcesController::class, 'getSuara']);



