<?php

namespace App\Providers;

use App\Models\Ad;
use App\Models\Page;
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
        if (env('APP_INSTALL')) {
            $match = FeaturedMatch::first();
            $helperObject = new HelperController();
            $matchData = json_decode($helperObject->getMatchDetail($match->match_id));


            $headerPages = Page::where('status', 'Active')->where(function ($query) {
                $query->where('position', 'Header')->orWhere('position', 'Both');
            })->get(['id', 'title', 'slug']);
            $footerPages = Page::where('status', 'Active')->where(function($query) {
                $query->where('position', 'Footer')->orWhere('position', 'Both');
            }) ->get(['id', 'title', 'slug']);

            $ads = Ad::oldest('position')->get();

            view()->share([
                'upcomingMatch' => $match,
                'headerPages' => $headerPages,
                'footerPages' => $footerPages,
                'upcomingMatchData' => $matchData, 
                'contact' => \App\Models\Social::first(),
                'ads' => $ads
            ]);
        }
    }
}
