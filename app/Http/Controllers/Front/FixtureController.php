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
    News,
    Page
};

class FixtureController extends Controller
{
    protected $helper;

    public function __construct()
    {
        $this->helper = new HelperController();
    }

    public function index()
    {
        $fixedLeagues = $this->helper->leagues();
        $date = request()->has('date') ? date('Y-m-d', strtotime(request()->date)) : date('Y-m-d');
        $fixtures = $this->fixtures($date);
        
        $data = [
            'fixedLeagues' => $fixedLeagues,
            'matchArray' => FootballMatch::pluck('matches')->toArray(),
            'date' => $date,
            'fixtures' => $this->helper->sortedFixture($fixtures, $fixedLeagues),
            'videos' => YoutubeVideo::latest('date')->take(5)->get(),
            'news' => News::latest('date')->take(5)->get()
        ];

        (new Visitor())->storeVisitor();
        return view('front.fixture', $data);
    }

    public function terms()
    {
        $data = [
            'news' => News::latest('date')->take(5)->get(),
            'videos' => YoutubeVideo::latest('date')->take(5)->get(),
            'page' => Page::where('id', 1)->first()
        ];
        (new Visitor())->storeVisitor();
        return view('front.page', $data);
    }

    public function privacy()
    {
        $data = [
            'news' => News::latest('date')->take(5)->get(),
            'videos' => YoutubeVideo::latest('date')->take(5)->get(),
            'page' => Page::where('id', 2)->first()
        ];
        (new Visitor())->storeVisitor();
        return view('front.page', $data);
    }

    private function fixtures($date)
    {
        return (cache()->get('fixture' . $date)) 
            ? cache()->get('fixture' . $date)
            : cache()->remember('fixture' . $date, 5 * 60, function () use ($date) {
                    return json_decode($this->helper->getTodaysFixture($date));
              }) ;
    }
}
