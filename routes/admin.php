<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    FeaturedMatchController,
    FootballMatchController,
    DashboardController,
    SocialController,
    LeagueController,
    TeamController
};

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::controller(LeagueController::class)->prefix('leagues')->as('leagues.')->group(function () {
    Route::get('', 'edit')->name('edit');
    Route::put('/update/{league}', 'update')->name('update');
});

Route::controller(TeamController::class)->prefix('teams')->as('teams.')->group(function () {
    Route::get('', 'edit')->name('edit');
    Route::put('/update/{team}', 'update')->name('update');
});

Route::controller(FeaturedMatchController::class)->prefix('featured-matches')->as('featured.matches.')->group(function () {
    Route::get('', 'edit')->name('edit');
    Route::put('/update/{match}', 'update')->name('update');
});

Route::controller(SocialController::class)->prefix('social')->as('socials.')->group(function () {
    Route::get('', 'edit')->name('edit');
    Route::put('/update', 'update')->name('update');
});

Route::resource('matches', FootballMatchController::class);