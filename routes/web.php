<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('pages.LandingPage');
})->name('landing');

Route::get('/home', function () {
    return view('pages.home');
})->middleware('auth');

Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::view('/transactions', 'pages.transaction')->middleware('auth');
Route::view('/products', 'pages.product')->middleware('auth');