<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\{
    HelperController,
    Controller
};
use App\Models\{
    FootballMatch,
    YoutubeVideo,
    Visitor,
    News
};

class LeagueController extends Controller
{
    protected $helper;

    public function __construct()
    {
        $this->helper = new HelperController();
    }

    public function index()
    {
        $fixedLeagues = $this->helper->leagues();
        $leagues = cache()->remember('leagues', 24 * 60 * 60, function () {
            return json_decode($this->helper->getLeagues());
        });

        $data = [
            'fixedLeagues' => $fixedLeagues,
            'leagues' => $this->helper->sortedLeagues($leagues, $fixedLeagues),
            'news' => News::latest('date')->take(5)->get(['id', 'photo', 'title', 'date']),
            'videos' => YoutubeVideo::latest('date')->take(5)->get(['id', 'title', 'date', 'link']),
        ];
        
        (new Visitor())->storeVisitor();

        return view('front.leagues.index', $data);
    }

    public function matches($league, $name)
    {
        $matches = cache()->remember('leagueFixtures' . $league, 5 * 60, function () use ($league) {
            return json_decode($this->helper->getLeagueMatches($league));
        });

        $futureMatches = $this->helper->upcomingFixture($matches, date('Y-m-d'));
        $upcomingMatches = collect($futureMatches)->sortBy('priority')->toArray();

        $data = [
            'title' => str_replace('-', ' ', ucwords($name)) . ' fixtures and score',
            'league' => $league,
            'name' => $name,
            'matchArray' => FootballMatch::pluck('matches')->toArray(),
            'news' => News::latest('date')->where('leagues', 'like', '%' . $league .'%')->select('id', 'photo', 'title', 'date')->take(5)->get(),
            'videos' => YoutubeVideo::latest('date')->where('leagues', 'like', '%' . $league .'%')->select('id', 'title', 'date', 'link')->take(5)->get(),
            'matches' => $this->helper->convertArrayToCollection($upcomingMatches, 33)
        ];

        (new Visitor())->storeVisitor();
        return view('front.leagues.matches', $data);
    }

    public function recent($league, $name)
    {
        $matches = cache()->remember('leagueRecentFixtures' . $league, 5 * 60, function () use ($league) {
            return json_decode($this->helper->getLeagueMatches($league));
        });
        $recentMatches = $this->helper->recentFixture($matches, date('Y-m-d'));
        $recentMatches = collect($recentMatches)->sortBy('date')->reverse()->toArray();

        $data = [
            'title' => str_replace('-', ' ', ucwords($name)) . ' fixtures and score',
            'league' => $league,
            'name' => $name,
            'matchArray' => FootballMatch::pluck('matches')->toArray(),
            'news' => News::latest('date')->where('leagues', 'like', '%' . $league . '%')->select('id', 'photo', 'title', 'date')->take(5)->get(),
            'videos' => YoutubeVideo::latest('date')->where('leagues', 'like', '%' . $league . '%')->select('id', 'title', 'date', 'link')->take(5)->get(),
            'matches' => $this->helper->convertArrayToCollection($recentMatches, 33)
        ];

        (new Visitor())->storeVisitor();
        return view('front.leagues.matches', $data);
    }

    public function standings($league, $name)
    {
        $data = [
            'title' => str_replace('-', ' ', ucwords($name)) . ' standing',
            'league' => $league,
            'name' =>$name, 
            'news' => News::latest('date')->where('leagues', 'like', '%' . $league . '%')->take(5)->get(['id', 'photo', 'title', 'date']),
            'videos' => YoutubeVideo::latest('date')->where('leagues', 'like', '%' . $league . '%')->take(5)->get(['id', 'title', 'date', 'link']),
            'leagues' => json_decode($this->helper->getLeagueStandings($league))
        ];

        (new Visitor())->storeVisitor();
        return view('front.leagues.standings', $data);
    }

    public function scores($league, $name)
    {
        $data = [
            'title' => str_replace('-', ' ', ucwords($name)) . ' standing',
            'league' => $league,
            'name' => $name,
            'news' => News::latest('date')->where('leagues', 'like', '%' . $league . '%')->take(5)->get(['id', 'photo', 'title', 'date']),
            'videos' => YoutubeVideo::latest('date')->where('leagues', 'like', '%' . $league . '%')->take(5)->get(['id', 'title', 'date', 'link']),
            'players' => json_decode($this->helper->getLeagueTopScores($league))
        ];

        (new Visitor())->storeVisitor();
        return view('front.leagues.score', $data);
    }
}
