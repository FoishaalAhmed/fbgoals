<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LeagueController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FeaturedMatchController;

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::controller(LeagueController::class)->prefix('leagues')->as('leagues.')->group(function () {
    Route::get('', 'edit')->name('edit');
    Route::put('/update/{league}', 'update')->name('update');
});

Route::controller(FeaturedMatchController::class)->prefix('featured-matches')->as('featured.matches.')->group(function () {
    Route::get('', 'edit')->name('edit');
    Route::put('/update/{match}', 'update')->name('update');
});

