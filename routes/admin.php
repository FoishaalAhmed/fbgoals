<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    FeaturedMatchController,
    FootballMatchController,
    YoutubeVideoController,
    DashboardController,
    SettingController,
    SocialController,
    SeasonController,
    LeagueController,
    PageController,
    NewsController,
    TeamController,
    UserController,
};

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::controller(LeagueController::class)->prefix('leagues')->as('leagues.')->group(function () {
    Route::get('', 'edit')->name('edit');
    Route::put('/update/{league}', 'update')->name('update');
});

Route::controller(SeasonController::class)->prefix('seasons')->as('seasons.')->group(function () {
    Route::get('', 'edit')->name('edit');
    Route::put('/update/{season}', 'update')->name('update');
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

Route::controller(SettingController::class)->prefix('settings')->as('settings.')->group(function () {
    Route::get('', 'create')->name('create');
    Route::post('/store', 'store')->name('store');;
});

Route::resource('pages', PageController::class)->except('show');
Route::resource('news', NewsController::class)->except('show');
Route::resource('matches', FootballMatchController::class)->except('show');
Route::resource('users', UserController::class)->except('show');
Route::resource('videos', YoutubeVideoController::class)->except('show');