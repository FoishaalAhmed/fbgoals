<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\{
    HelperController,
    Controller
};
use App\Models\{
    FootballMatch,
    YoutubeVideo,
    News
};

class LiveController extends Controller
{
    protected $helper;

    public function __construct()
    {
        $this->helper = new HelperController();
    }

    public function index()
    {
        $match = cache()->remember('liveMatches', 60, function () {
            return json_decode($this->helper->getLiveMatches());
        });
        $leagueMatch = $this->helper->sortedFixture($match);

        $data = [
            'fixedLeagues' => $this->helper->leagues(),
            'matches' => collect($leagueMatch)->sortBy('priority')->toArray(),
            'matchArray' => FootballMatch::pluck('matches')->toArray(),
            'news' => News::latest('date')->take(5)->get(['id', 'photo', 'title', 'date']),
            'videos' => YoutubeVideo::latest('date')->take(5)->get(['id', 'title', 'date', 'link'])
        ];
        
        return view('front.livescore', $data);
    }

    public function matches()
    {
        $match = $this->fixtures(date('Y-m-d'));
        $matchArray = FootballMatch::pluck('matches')->toArray();
        $leagueMatch = $this->helper->sortedFixture($match, null, false,false, $matchArray);

        $data = [
            'fixedLeagues' => $this->helper->leagues(),
            'matches' => collect($leagueMatch)->sortBy('priority')->toArray(),
            'matchArray' => $matchArray,
            'news' => News::latest('date')->take(5)->get(['id', 'photo', 'title', 'date']),
            'videos' => YoutubeVideo::latest('date')->take(5)->get(['id', 'title', 'date', 'link'])
        ];
        
        return view('front.livematch', $data);
    }

    private function fixtures($date)
    {
        return (cache()->get('fixture' . $date))
            ? cache()->get('fixture' . $date)
            : cache()->remember('fixture' . $date, 5 * 60, function () use ($date) {
                return json_decode($this->helper->getTodaysFixture($date));
            });
    }
}
