<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});



Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::view('/profile', 'backend.profile')->name('profile');

    Route::controller(ProfileController::class)->prefix('profile')->as('profile.')->group(function () {
        Route::post('/info-update', 'info')->name('info');
        Route::post('/photo-update', 'photo')->name('photo');
        Route::post('/password-update', 'password')->name('password');
    });
});

require __DIR__.'/auth.php';
