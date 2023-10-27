<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\{
    HelperController,
    Controller
};
use App\Models\{
    FootballMatch,
    YoutubeVideo,
    MatchLink,
    Visitor,
    News
};

class MatchController extends Controller
{
    protected $helper;

    public function __construct()
    {
        $this->helper = new HelperController();
    }

    public function detail($matchId, $matches)
    {
        $fbMatch = FootballMatch::where('matches', $matchId)->first();

        if ($fbMatch) {
            $data['links'] = MatchLink::where('football_match_id', $fbMatch->id)->get();
        }

        $data['match'] = $match = $this->getMatchDetails($matchId);

        if ($match) {
            $teamOne = $match[0]->teams->home->id;
            $teamTwo = $match[0]->teams->away->id;
            $data['title'] = $match[0]->teams->home->name . ' vs '. $match[0]->teams->away->name . ' - Football Match Summary - ' . date('F d, Y', strtotime($match[0]->fixture->date));
            $data['headToHead'] = $this->getTeamHeadToHead($matchId, $teamOne, $teamTwo);
        } else {
            abort(404);
        }
        
        $data['news'] = News::latest('date')->take(5)->get(['id', 'photo', 'title', 'date']);
        $data['videos'] = YoutubeVideo::latest('date')->take(5)->get(['id', 'title', 'date', 'link']);
        (new Visitor())->storeVisitor();
        return view('front.match.detail', $data);
    }

    public function getMatchDetails($matchId)
    {
        return (cache()->get('match' . $matchId)) 
            ? cache()->get('match' . $matchId)
            : cache()->remember(
                'match' . $matchId,
                15, 
                function () 
                use ($matchId) 
                {
                    return json_decode($this->helper->getMatchDetail($matchId));
                }
            );
    }

    public function getTeamHeadToHead($matchId, $teamOne, $teamTwo)
    {
        return (cache()->get('headToHead' . $matchId)) 
            ? cache()->get('headToHead' . $matchId)
            : cache()->remember(
                'headToHead' . $matchId, 
                24 * 60 * 60, 
                function () 
                use ($teamOne, $teamTwo) 
                {
                    return json_decode($this->helper->getTeamHeadToHead($teamOne, $teamTwo));
                }
            );
    }
}
