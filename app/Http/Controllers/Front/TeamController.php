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

class TeamController extends Controller
{
    protected $helper;

    public function __construct()
    {
        $this->helper = new HelperController();
    }

    public function index()
    {
        $data = [
            'news' => News::latest('date')->take(5)->get(['id', 'photo', 'title', 'date']),
            'videos' => YoutubeVideo::latest('date')->take(5)->get(['id', 'title', 'date', 'link'])
        ];

        (new Visitor())->storeVisitor();
        return view('front.teams.index', $data);
    }

    public function matches($team, $name)
    {
        $fixedLeagues = $this->helper->leagues();
        $matches = cache()->remember('teamFixtures' . $team, 5 * 60, function () use ($team) {
            return json_decode($this->helper->getTeamMatches($team));
        });
        $futureMatches = $this->helper->sortedFixture($matches, null , true);

        $data = [
            'teamId' => $team,
            'name' => $name,
            'fixedLeagues' => $fixedLeagues,
            'leagueId' => request()->league,
            'matchArray' => FootballMatch::pluck('matches')->toArray(),
            'title' => str_replace('-', ' ', ucwords($name)) . ' fixtures | FBGOALS',
            'matches' => $this->helper->convertArrayToCollection($futureMatches),
            'news' => News::latest('date')->take(5)->get(['id', 'photo', 'title', 'date']),
            'videos' => YoutubeVideo::latest('date')->take(5)->get(['id', 'title', 'date', 'link'])
        ];
        (new Visitor())->storeVisitor();
        return view('front.teams.matches', $data);
    }

    public function recent($team, $name)
    {
        $fixedLeagues = $this->helper->leagues();
        $matches = cache()->remember('teamRecentFixtures' . $team, 5 * 60, function () use ($team) {
            return json_decode($this->helper->getTeamMatches($team));
        });
        $recentMatches = $this->helper->sortedFixture($matches, null, false, true);

        $data = [
            'teamId' => $team,
            'name' => $name,
            'fixedLeagues' => $fixedLeagues,
            'leagueId' => request()->league,
            'matchArray' => FootballMatch::pluck('matches')->toArray(),
            'matches' => $this->helper->convertArrayToCollection($recentMatches),
            'title' => str_replace('-', ' ', ucwords($name)) . ' recent fixtures | FBGOALS',
            'news' => News::latest('date')->take(5)->get(['id', 'photo', 'title', 'date']),
            'videos' => YoutubeVideo::latest('date')->take(5)->get(['id', 'title', 'date', 'link'])
        ];
        
        (new Visitor())->storeVisitor();
        return view('front.teams.matches', $data);
    }

    public function info($team, $name)
    {
        $data = [
            'teamId' => $team,
            'name' => $name,
            'leagueId' => request()->league,
            'team' => json_decode($this->helper->getTeamInfo($team)),
            'title' => str_replace('-', ' ', ucwords($name)) . ' info | FBGOALS',
            'news' => News::latest('date')->take(5)->get(['id', 'photo', 'title', 'date']),
            'videos' => YoutubeVideo::latest('date')->take(5)->get(['id', 'title', 'date', 'link'])
        ];
        (new Visitor())->storeVisitor();
        return view('front.teams.info', $data);
    }

    public function statistics($team, $name)
    {
        $league = request()->league;
        $data = [
            'teamId' => $team,
            'name' => $name,
            'leagueId' => $league,
            'title' => str_replace('-', ' ', ucwords($name)) . ' statistics | FBGOALS',
            'statistics' => json_decode($this->helper->getTeamStatistics($team, $league)),
            'news' => News::latest('date')->take(5)->get(['id', 'photo', 'title', 'date']),
            'videos' => YoutubeVideo::latest('date')->take(5)->get(['id', 'title', 'date', 'link'])
        ];
        (new Visitor())->storeVisitor();
        return view('front.teams.statistic', $data);
    }

    public function player($team, $name)
    {
        $data = [
            'teamId' => $team,
            'name' => $name,
            'leagueId' => request()->league,
            'players' => json_decode($this->helper->getTeamPlayer($team)),
            'title' => str_replace('-', ' ', ucwords($name)) . ' players | FBGOALS',
            'news' => News::latest('date')->take(5)->get(['id', 'photo', 'title', 'date']),
            'videos' => YoutubeVideo::latest('date')->take(5)->get(['id', 'title', 'date', 'link'])
        ];
        (new Visitor())->storeVisitor();
        return view('front.teams.player', $data);
    }

}
