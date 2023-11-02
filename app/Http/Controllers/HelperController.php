<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator; 
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\Paginator;
use App\Models\League;

class HelperController extends Controller
{
    protected $baseUrl, $season;

    public function __construct()
    {
        $this->baseUrl = 'http://gtvcricketlive.com/';
        $this->season  = season();

        if (isset($_COOKIE["client_timezone"]) && !empty($_COOKIE["client_timezone"])) {

            $_SESSION["client_timezone"] = $_COOKIE["client_timezone"];
            date_default_timezone_set($_COOKIE["client_timezone"]);
            \Config::set('app.timezone', $_COOKIE["client_timezone"]);
        }
    }

    function execute(string $url, string $method = 'GET')
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL            => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => '',
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => $method,
            CURLOPT_HTTPHEADER     => array(
                settings('api_key')
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }

    public function convertArrayToCollection($items, $perPage = 10, $page = null)
    {
        $options = ['path' => url()->current(), 'pageName' => 'page'];
        $page    = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items   = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    function getLiveMatches()
    {
        $url     = $this->baseUrl.'fixtures/live';
        $method  = 'GET';
        $matches = self::execute($url, $method);
        return $matches;
    }

    function getLeagues()
    {
        $url     = $this->baseUrl . 'leagues/current=true';
        $method  = 'GET';
        $leagues = self::execute($url, $method);
        return $leagues;
    }

    function getTodaysFixture($date)
    {
        $url      = $this->baseUrl . 'fixtures/date=' . $date;
        $method   = 'GET';
        $fixtures = self::execute($url, $method);
        return $fixtures;
    }

    function getLeagueMatches($league)
    {
        $url      = $this->baseUrl . 'leaguefixtures/leagusid=' . $league . '/season='. $this->season;
        $method   = 'GET';
        $fixtures = self::execute($url, $method);
        return $fixtures;
    }

    function getLeagueStandings($league)
    {
        $url       = $this->baseUrl . 'standings/league=' . $league . '/season=' . $this->season;
        $method    = 'GET';
        $standings = self::execute($url, $method);
        return $standings;
    }

    public function getMatchDetail($matchId)
    {
        $url    = $this->baseUrl . 'fixtures/id=' . $matchId;
        $method = 'GET';
        $match  = self::execute($url, $method);
        return $match;
    }

    public function getTeamHeadToHead($teamOne, $teamTwo)
    {
        $url        = $this->baseUrl . 'fixtures/headtohead/h2h=' . $teamOne .'-' . $teamTwo;
        $method     = 'GET';
        $headToHead = self::execute($url, $method);
        return $headToHead;
    }

    public function getTeamMatches($team)
    {
        $url      = $this->baseUrl . 'teamfixtures/team='. $team .'/season=' . $this->season;
        $method   = 'GET';
        $fixtures = self::execute($url, $method);
        return $fixtures;
    }

    public function getTeamInfo($team)
    {
        $url      = $this->baseUrl . 'teaminfo/team=' . $team;
        $method   = 'GET';
        $teamInfo = self::execute($url, $method);
        return $teamInfo;
    }

    public function getTeamStatistics($team, $leagueId)
    {
        $url        = $this->baseUrl . 'teamstatiaties/league='. $leagueId .'/team='. $team .'/season='. $this->season;
        $method     = 'GET';
        $statistics = self::execute($url, $method);
        return $statistics;
    }

    public function getTeamPlayer($team)
    {
        $url     = $this->baseUrl . 'getplayers/season=' . $this->season . '/teamid=' . $team ;
        $method  = 'GET';
        $players = self::execute($url, $method);
        return $players;
    }

    public function getLeagueTopScores($league)
    {
        $url     = $this->baseUrl . 'topscore/league='. $league .'/season='. $this->season ;
        $method  = 'GET';
        $players = self::execute($url, $method);
        return $players;
    }

    public function sortedFixture(
        $fixtures, 
        $selectedLeague = null, 
        $upcoming = false, 
        $recent = false, 
        $selectedMatches = null
    )
    {
        $priorityStatus = [
            '1H'   => 1, 'HT'  => 1, '2H'  => 1, 
            'ET'   => 1, 'BT'  => 1, 'P'   => 1, 
            'LIVE' => 1, 'NS'  => 2, 'TBD' => 3, 
            'SUSP' => 3, 'INT' => 3, 'FT'  => 3, 
            'AET'  => 3, 'PEN' => 3, 'PST' => 3, 
            'CANC' => 3, 'ABD' => 3, 'AWD' => 3, 
            'WO'   => 3
        ];
        $fixedLeagues = $this->leagues();
        $date = date('Y-m-d');
        $leagueId = [];

        foreach ($fixtures as $key => $value) {

            if ($selectedLeague != null && !in_array($value->league->id, $selectedLeague)) continue;
            if ($upcoming == true && date('Y-m-d', strtotime($value->fixture->date)) < $date) continue;
            if ($recent == true && date('Y-m-d', strtotime($value->fixture->date)) >= $date) continue;
            if ($selectedMatches != null && !in_array($value->fixture->id, $selectedMatches)) continue;

            $matches[] = [
                'priority'     => $priorityStatus[$value->fixture->status->short],
                'fixtureId'    => $value->fixture->id,
                'homeTeamId'   => $value->teams->home->id,
                'homeTeamName' => $value->teams->home->name,
                'homeTeamLogo' => $value->teams->home->logo,
                'homeTeamGoal' => $value->goals->home,
                'awayTeamId'   => $value->teams->away->id,
                'awayTeamName' => $value->teams->away->name,
                'awayTeamLogo' => $value->teams->away->logo,
                'awayTeamGoal' => $value->goals->away,
                'shortStatus'  => $value->fixture->status->short,
                'longStatus'   => $value->fixture->status->long,
                'league'       => $value->fixture->venue->name . ', ' . $value->fixture->venue->city,
                'leagueId'     => $value->league->id,
                'date'         => $value->fixture->timestamp,
                'elapsed'      => $value->fixture->status->elapsed,
            ];

            $leagueId[] = [
                'id' => $value->league->id,
                'name' => $value->league->name . ', ' . $value->league->country,
            ];
        }

        $uniqueLeagues = array_map("unserialize", array_unique(array_map("serialize", $leagueId)));

        foreach ($uniqueLeagues as $key => $value) {
            $leagueMatch[] = [
                'matches' => collect($matches)->where('leagueId', $value['id'])->sortBy('priority'),
                'league' => $value['name'],
                'leagueid' => $value['id'],
                'priority' => in_array($value['id'], $fixedLeagues) ? 1 : 2 
            ];
        }

        return isset($leagueMatch) ? $leagueMatch : null;
    }

    public function upcomingFixture($fixtures, $date)
    {
        $priorityStatus = [
            '1H'   => 1, 'HT'  => 1, '2H'  => 1, 
            'ET'   => 1, 'BT'  => 1, 'P'   => 1, 
            'LIVE' => 1, 'NS'  => 2, 'TBD' => 3, 
            'SUSP' => 3, 'INT' => 3, 'FT'  => 3, 
            'AET'  => 3, 'PEN' => 3, 'PST' => 3, 
            'CANC' => 3, 'ABD' => 3, 'AWD' => 3, 
            'WO'   => 3
        ];

        foreach ($fixtures as $key => $match) {
            if (date('Y-m-d', strtotime($match->fixture->date)) >= $date) {
                $upcomingFixture[] = [
                    'priority'     => $priorityStatus[$match->fixture->status->short],
                    'fixtureId'    => $match->fixture->id,
                    'homeTeamId'   => $match->teams->home->id,
                    'homeTeamName' => $match->teams->home->name,
                    'homeTeamLogo' => $match->teams->home->logo,
                    'homeTeamGoal' => $match->goals->home,
                    'awayTeamId'   => $match->teams->away->id,
                    'awayTeamName' => $match->teams->away->name,
                    'awayTeamLogo' => $match->teams->away->logo,
                    'awayTeamGoal' => $match->goals->away,
                    'shortStatus'  => $match->fixture->status->short,
                    'longStatus'   => $match->fixture->status->long,
                    'league'       => $match->league->name . ', ' . $match->league->country,
                    'leagueId'     => $match->league->id,
                    'date'         => $match->fixture->timestamp,
                    'elapsed'      => $match->fixture->status->elapsed,
                ];
            }
        }

        return isset($upcomingFixture) ? $upcomingFixture : null;
    }

    public function recentFixture($fixtures, $date)
    {
        foreach ($fixtures as $key => $match) {
            if (date('Y-m-d', strtotime($match->fixture->date)) < $date) {
                $recentMatches[] = [
                    'fixtureId'    => $match->fixture->id,
                    'homeTeamId'   => $match->teams->home->id,
                    'homeTeamName' => $match->teams->home->name,
                    'homeTeamLogo' => $match->teams->home->logo,
                    'homeTeamGoal' => $match->goals->home,
                    'awayTeamId'   => $match->teams->away->id,
                    'awayTeamName' => $match->teams->away->name,
                    'awayTeamLogo' => $match->teams->away->logo,
                    'awayTeamGoal' => $match->goals->away,
                    'shortStatus'  => $match->fixture->status->short,
                    'longStatus'   => $match->fixture->status->long,
                    'league'       => $match->league->name . ', ' . $match->league->country,
                    'leagueId'     => $match->league->id,
                    'date'         => $match->fixture->timestamp,
                    'elapsed'      => $match->fixture->status->elapsed,
                ];
            }
        }

        return isset($recentMatches) ? $recentMatches : null;
    }

    public function sortedLeagues($league, $fixedLeagues)
    {
        $leagues = [];
        foreach ($league as $item) {
            if (in_array($item->league->id, $fixedLeagues)) {
                $selectedLeague[] = [
                    'id'      => $item->league->id,
                    'logo'    => $item->league->logo,
                    'name'    => $item->league->name,
                    'country' => $item->country->name,
                ];
            }
        }
        
        foreach ($fixedLeagues as $value) {
            array_push($leagues, $selectedLeague[array_search($value, array_column($selectedLeague, 'id'))]);
        }

        return $leagues;
    }

    public function leagues()
    {
        $leagues = League::first('leagues');
        $fixedLeagues = explode(',', $leagues->leagues);

        return $fixedLeagues;
    }
}
