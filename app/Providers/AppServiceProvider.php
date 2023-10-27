<?php

namespace App\Providers;

use App\Models\FeaturedMatch;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\HelperController;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);

        Paginator::useBootstrap();
        $match = FeaturedMatch::first();
        $helperObject = new HelperController();
        $matchData = json_decode($helperObject->getMatchDetail($match->match_id));
        view()->share(['contact' => \App\Models\Social::first(), 'upcomingMatchData' => $matchData, 'upcomingMatch' => $match]);
    }
}
