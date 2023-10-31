<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Front\{
    FixtureController,
    HomeController,
    LeagueController,
    LiveController,
    MatchController,
    NewsController,
    TeamController,
    VideoController
};
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::post('time-zone', [HomeController::class, 'timeZone'])->name('set.timeZone');



//league route start here......
Route::get('leagues', [LeagueController::class, 'index'])->name('leagues');
Route::get('league-matches/{league}/{name}', [LeagueController::class, 'matches'])->name('leagues.matches');
Route::get('league-recent-matches/{league}/{name}', [LeagueController::class, 'recent'])->name('leagues.recent');
Route::get('league-standing/{league}/{name}', [LeagueController::class, 'standings'])->name('leagues.standings');
Route::get('league-scores/{league}/{name}', [LeagueController::class, 'scores'])->name('leagues.scores');
//league route end here......

// team route start here....

Route::get('teams', [TeamController::class, 'index'])->name('teams');
Route::get('team-matches/{team}/{name}', [TeamController::class, 'matches'])->name('teams.matches');
Route::get('team-recent-matches/{team}/{name}', [TeamController::class, 'recent'])->name('teams.recent');
Route::get('team-info/{team}/{name}', [TeamController::class, 'info'])->name('teams.info');
Route::get('team-statistics/{team}/{name}', [TeamController::class, 'statistics'])->name('teams.statistics');
Route::get('team-player/{team}/{name}', [TeamController::class, 'player'])->name('teams.player');

// team route end here....

//match detail

Route::get('fixture/{fixtureid}/{match}', [MatchController::class, 'detail'])->name('match.detail');

//feature route

Route::get('fixtures', [FixtureController::class, 'index'])->name('fixtures');
Route::get('terms-and-conditions', [FixtureController::class, 'terms'])->name('terms');
Route::get('privacy-policy', [FixtureController::class, 'privacy'])->name('privacy');


//Route::get('fixtures', [FextureController])

//news route start here......
Route::get('news', [NewsController::class, 'index'])->name('news');
Route::get('news/detail', [NewsController::class, 'detail'])->name('news.detail');
Route::get('league-news', [NewsController::class, 'leagueNews'])->name('league.news');
Route::get('team-news', [NewsController::class, 'teamNews'])->name('team.news');
//news route end here......

//youtube video route start here......
Route::get('videos', [VideoController::class, 'index'])->name('videos');
Route::get('league-videos', [VideoController::class, 'leagueVideo'])->name('league.videos');
Route::get('team-videos', [VideoController::class, 'teamVideo'])->name('team.videos');
//youtube video route end here......

//live match route start here......

Route::get('live-scores', [LiveController::class, 'index'])->name('live.scores');
Route::get('live-matches', [LiveController::class, 'matches'])->name('live.matches');

//live match route end here......



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
