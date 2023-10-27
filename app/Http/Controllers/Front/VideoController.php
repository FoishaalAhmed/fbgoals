<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\{
    YoutubeVideo,
    Visitor,
    News
};

class VideoController extends Controller
{
    public function index()
    {
        $data = [
            'videos' => YoutubeVideo::latest('date')->paginate(24),
            'news' => News::latest('date')->take(5)->get()
        ];
        (new Visitor())->storeVisitor();
        return view('front.videos.index', $data);
    }

    public function leagueVideo()
    {
        $league = request()->league;
        $data = [
            'news' => News::latest('date')->where('leagues', 'like', '%' . $league . '%')->take(5)->get(['id', 'photo', 'title', 'date']),
            'videos' => YoutubeVideo::latest('date')->where('leagues', 'like', '%' . $league . '%')->select('id', 'title', 'date', 'link')->paginate(24)
        ];
        (new Visitor())->storeVisitor();
        return view('front.videos.index', $data);
    }

    public function teamVideo()
    {
        $team = request()->team;
        $data = [
            'videos' => YoutubeVideo::latest('date')->where('teams', 'like', '%' . $team . '%')->select('id', 'title', 'date', 'link')->paginate(30),
            'news' => News::latest('date')->where('teams', 'like', '%' . $team . '%')->take(5)->get(['id', 'photo', 'title', 'date'])
        ];
        (new Visitor())->storeVisitor();
        return view('front.videos.index', $data);
    }
}
