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


class HomeController extends Controller
{
    protected $helper;

    public function __construct()
    {
        $this->helper = new HelperController();
    }

    public function index()
    {
        $fixedLeagues = $this->helper->leagues();
        $matches = cache()->remember('matches', 60, function () {
                return json_decode($this->helper->getLiveMatches());
            });
        $fixtures = cache()->remember('fixtures', 5 * 60, function () {
            return json_decode($this->helper->getTodaysFixture(date('Y-m-d')));
        });

        $data = [
            'matches' => $this->helper->sortedFixture($matches, $fixedLeagues),
            'fixtures' => $this->helper->sortedFixture($fixtures, $fixedLeagues),
            'matchArray' => FootballMatch::pluck('matches')->toArray(),
            'fixedLeagues' => $fixedLeagues,
            'news' => News::latest()->take(5)->get(),
            'videos' => YoutubeVideo::latest()->take(5)->get(),
        ];
        (new Visitor())->storeVisitor();
        return view('front.home', $data);
    }
}
