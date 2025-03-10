<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SportbikeController;

// ✅ Landing Page
Route::get('/', function () {
    return view('pages.LandingPage');
})->name('landing');

// ✅ Home Page (Requires Authentication)
Route::get('/home', function () {
    return view('pages.home');
})->middleware('auth')->name('home');

// ✅ Admin Edit Page (Requires Authentication)
Route::get('/adminEdit', function () {
    return view('pages.adminEdit');
})->middleware('auth')->name('adminEdit');

// ✅ Authentication Routes
Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); // ✅ Fixed logout method

// ✅ Records - Accessible to users with "view-records" permission (Both Admin & Data Entry)
Route::get('/records', [SportbikeController::class, 'index'])
    ->middleware(['auth', 'permission:view-records'])
    ->name('records');

// ✅ Sportbike Management - Only Admins Can Create, Edit, and Delete
Route::middleware(['auth', 'permission:manage-records'])->group(function () {
    Route::get('/sportbikes/create', [SportbikeController::class, 'create'])->name('sportbikes.create');
    Route::post('/sportbikes', [SportbikeController::class, 'store'])->name('sportbikes.store');
    Route::get('/sportbikes/{sportbike}/edit', [SportbikeController::class, 'edit'])->name('sportbikes.edit');
    Route::put('/sportbikes/{sportbike}', [SportbikeController::class, 'update'])->name('sportbikes.update');
    Route::delete('/sportbikes/{sportbike}', [SportbikeController::class, 'destroy'])->name('sportbikes.destroy');
});
