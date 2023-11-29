<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\{
    YoutubeVideo,
    Visitor,
    News
};

class NewsController extends Controller
{
    public function index()
    {
        $data = [
            'news' => News::latest('date')->where('status', 'Published')->paginate(24),
            'videos' => YoutubeVideo::latest('date')->take(5)->get()->toArray()
        ];
        (new Visitor())->storeVisitor();
        return view('front.news.index', $data);
    }

    public function detail(News $news)
    {
        $data = [
            'news' => $news,
            'latestNews' => News::where('status', 'Published')->latest('date')->take(5)->get(),
            'videos' => YoutubeVideo::latest('date')->take(5)->get()
        ];
        (new Visitor())->storeVisitor();
        return view('front.news.detail', $data);
    }

    public function leagueNews()
    {
        $league = request()->league;
        $data = [
            'news' => News::latest('date')->where('status', 'Published')->where('leagues', 'like', '%' . $league . '%')->select('id', 'photo', 'title', 'date')->paginate(24),
            'videos' => YoutubeVideo::latest('date')->where('leagues', 'like', '%' . $league . '%')->take(5)->get(['id', 'title', 'date', 'link'])->toArray()
        ];

        (new Visitor())->storeVisitor();
        return view('front.news.index', $data);
    }

    public function teamNews()
    {
        $team = request()->team;
        $data = [
            'news' => News::latest('date')->where('status', 'Published')->where('teams', 'like', '%' . $team . '%')->select('id', 'photo', 'title', 'date')->paginate(30),
            'videos' => YoutubeVideo::latest('date')->where('teams', 'like', '%' . $team . '%')->take(5)->get(['id', 'title', 'date', 'link'])
        ];

        (new Visitor())->storeVisitor();
        return view('front.news.index', $data);
    }
}
