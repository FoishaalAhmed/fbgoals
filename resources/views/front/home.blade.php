@extends('layouts.app')

@section('title', __('Football Teams, Scores, Stats, News, Fixtures, Results, Tables - :x' , ['x' => settings('name')]))

@section('css')
    <link rel="stylesheet" href="{{ asset('public/assets/front/css/home.min.css') }}">
@endsection

@section('content')
    <!--Main Content Start-->
    <div class="main-content wf100">

        @php
            $liveStatus = ['1H', 'HT', '2H', 'ET', 'BT', 'P', 'INT', 'LIVE'];
            $statusArray = ['TBD', 'NS', 'PST', 'CANC', 'ABD', 'AWD', 'WO'];
            $sl = 100;
        @endphp

        <!--Sports Widgets Start-->
        <section class="wf100 p80">
            <div class="container">
                <div class="row">

                    @if (session()->has('error'))
                        <div class="col-md-12">
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>{{ session('error') }}</strong>
                            </div>
                        </div>
                    @endif
                    @if ($ads->where('position', 'top')->first())
                        <div class="col-md-12" style="margin-bottom: 10px;"> 
                            <center>
                                {!! $ads->where('position', 'top')->first()->ad !!}
                            </center>
                        </div>
                    @endif
                    <div class="col-lg-3 col-md-3">
                        <div class="point-table-widget mb-10">
                            <table>
                                <thead>
                                    <tr>
                                        <th>{{ __('Leagues') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="{{ route('leagues.matches', [1, 'world-cup']) }}"><img src="https://media.api-sports.io/football/leagues/1.png" class="img-class"> <strong class="text-align">World Cup, World</strong></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="{{ route('leagues.matches', [39, 'premier-league']) }}"><img
                                                    src="https://media.api-sports.io/football/leagues/39.png" 
                                                 class="img-class">
                                                <strong class="text-align">Premier League,
                                                    England</strong></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="{{ route('leagues.matches', [135, 'serie-a']) }}"><img
                                                    src="https://media.api-sports.io/football/leagues/135.png"
                                                     class="img-class">
                                                <strong class="text-align">Serie A, Italy</strong></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="{{ route('leagues.matches', [2, 'uefa-champions-league']) }}"><img
                                                    src="https://media.api-sports.io/football/leagues/2.png" 
                                                 class="img-class">
                                                <strong class="text-align">UEFA Champions League,
                                                    World</strong></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="{{ route('leagues.matches', [3, 'uefa-europa-league']) }}"><img
                                                    src="https://media.api-sports.io/football/leagues/3.png" 
                                                 class="img-class">
                                                <strong class="text-align">UEFA Europa League,
                                                    World</strong></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="{{ route('leagues.matches', [6, 'africa-cup-of-nations']) }}"><img
                                                    src="https://media.api-sports.io/football/leagues/6.png" 
                                                 class="img-class">
                                                <strong class="text-align">Africa Cup of Nations,
                                                    World</strong></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="{{ route('leagues.matches', [9, 'copa-america']) }}"><img
                                                    src="https://media.api-sports.io/football/leagues/9.png" 
                                                 class="img-class">
                                                <strong class="text-align">Copa America,
                                                    World</strong></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="{{ route('leagues.matches', [10, 'friendlies']) }}"><img
                                                    src="https://media.api-sports.io/football/leagues/10.png" 
                                                 class="img-class">
                                                <strong class="text-align">Friendlies,
                                                    World</strong></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><a href="{{ route('leagues') }}">
                                                <strong>{{ __('View All') }}</strong></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="trending-news">
                            @foreach ($news as $key => $item)
                                <!--Expand-->
                                <div class="list-box-expand <?= $key == 0 ? 'active' : '' ?>">
                                    <div class="news-caption">
                                        <div class="news-txt">
                                            <h4><a  href="{{ route('news.detail', [$item->id, str_replace([' ', '_', '&'], '-', strtolower($item->title))]) }}">{{ $item->title }}</a>
                                            </h4>
                                            <ul class="news-meta">
                                                <li><i class="fe-calendar"></i>
                                                    {{ date('D M, Y', strtotime($item->date)) }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="expand-news-img"><img src="{{ $item->image }}"></div>
                                </div>
                                <!--Expand-->
                            @endforeach

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="row">
                            <div class="col-12">
                                <nav>
                                    <div class="nav" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link nav-active-home" id="nav-1-tab" data-toggle="tab"
                                            href="#nav-defenders" role="tab" aria-controls="nav-defenders"
                                            aria-selected="true">{{ __('Live Matches') }}</a>

                                        <a class="nav-item nav-link nav-active-home active" id="nav-2-tab" data-toggle="tab"
                                            href="#nav-gk" role="tab" aria-controls="nav-gk"
                                            aria-selected="false">{{ __('Today\'s Matches') }}</a>
                                    </div>
                                </nav>
                            </div>
                        </div>
                        <!--Box Start-->
                        <div class="tab-content wf100" id="nav-tabContent">
                            <div class="tab-pane fade" id="nav-defenders" role="tabpanel"
                                aria-labelledby="nav-1-tab">
                                <div class="accordion" id="accordionExample">
                                    <?php $liveIds = []; ?>

                                    @if ($matches)
                                        @foreach ($matches as $key => $value)
                                            <div class="item">
                                                <div class="item-header" id="<?= $key ?>">
                                                    <h2 class="mb-20">
                                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                                            data-target="#collapseOne<?= $key ?>" aria-expanded="true"
                                                            aria-controls="collapseOne<?= $key ?>">
                                                            {{ $value['league'] }}
                                                            <i class="fe-chevron-down"></i>
                                                        </button>
                                                    </h2>
                                                </div>

                                                <div id="collapseOne<?= $key ?>"
                                                    class="collapse {{ $key == 0 ? 'show' : '' }}"
                                                    aria-labelledby="headingOne<?= $key ?>"
                                                    data-parent="#accordionExample">
                                                    @foreach ($value['matches'] as $match)
                                                        <?php array_push($liveIds, $match['fixtureId']); ?>
                                                        <div class="last-match-result-full-light"
                                                            onclick="redirectToURL('{{ route('match.detail', [$match['fixtureId'], str_replace(' ', '-', strtolower($match['homeTeamName'] . ' vs ' . $match['awayTeamName']))]) }}')">
                                                            <div class="row">
                                                                <div class="col-5 no-padding">
                                                                    <div class="match-left">
                                                                        <div class="mtl-left"> <img
                                                                                src="{{ $match['homeTeamLogo'] }}"
                                                                                >
                                                                            <strong><a class="color-bcc9ea"
                                                                                    href="{{ route('teams.matches', [$match['homeTeamId'], str_replace([' ', '_', "'", '&'], '-', strtolower($match['homeTeamName'])), 'league' => $match['leagueId']]) }}">{{ $match['homeTeamName'] }}</a></strong>
                                                                        </div>
                                                                        <div class="mscore float-right">
                                                                            <strong>{{ $match['homeTeamGoal'] }}</strong>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="col-2 no-padding">
                                                                    <div class="lmr-info">
                                                                        <strong class="color-font-6ed950-15">{{ $match['elapsed'] . '"' }}</strong>
                                                                        <a href="{{ route('match.detail', [$match['fixtureId'], str_replace(' ', '-', strtolower($match['homeTeamName'] . ' vs ' . $match['awayTeamName']))]) }}" class="mh padding-0-5">{{ in_array($match['fixtureId'], $matchArray) && in_array($match['shortStatus'], $liveStatus) ? __('Watch Live') : __('Live') }}</a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-5 no-padding">
                                                                    <div class="match-right">
                                                                        <div class="mscore">
                                                                            <strong>{{ $match['awayTeamGoal'] }}</strong>
                                                                        </div>
                                                                        <div class="mtl-right"> <img
                                                                                src="{{ $match['awayTeamLogo'] }}"
                                                                                >
                                                                            <strong><a class="color-bcc9ea"
                                                                                    href="{{ route('teams.matches', [$match['awayTeamId'], str_replace([' ', '_', "'", '&'], '-', strtolower($match['awayTeamName'])), 'league' => $match['leagueId']]) }}">{{ $match['awayTeamName'] }}</a></strong>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <h3 class="align-color-font">
                                            {{ __('Live Match Not Available') }}</h3>
                                    @endif

                                </div>
                            </div>

                            <div class="tab-pane fade show active" id="nav-gk" role="tabpanel" aria-labelledby="nav-2-tab">
                                <div class="accordion" id="accordionExample">

                                    @if ($fixtures)
                                        @foreach ($fixtures as $key => $value)
                                            <div class="item">
                                                <div class="item-header" id="<?= $sl ?>">
                                                    <h2 class="mb-20">
                                                        <button class="btn btn-link" type="button"
                                                            data-toggle="collapse" data-target="#collapseOne<?= $sl ?>"
                                                            aria-expanded="true" aria-controls="collapseOne<?= $sl ?>">
                                                            {{ $value['league'] }}
                                                            <i class="fe-chevron-down"></i>
                                                        </button>
                                                    </h2>
                                                </div>

                                                <div id="collapseOne<?= $sl ?>"
                                                    class="collapse {{ $sl == 100 ? 'show' : '' }}"
                                                    aria-labelledby="headingOne<?= $sl ?>"
                                                    data-parent="#accordionExample">
                                                    @foreach ($value['matches'] as $match)
                                                        <div class="last-match-result-full-light"
                                                            onclick="redirectToURL('{{ route('match.detail', [$match['fixtureId'], str_replace(' ', '-', strtolower($match['homeTeamName'] . ' vs ' . $match['awayTeamName']))]) }}')">
                                                            <div class="row">
                                                                <div class="col-5 no-padding">
                                                                    <div class="match-left">
                                                                        <div class="mtl-left"> <img
                                                                                src="{{ $match['homeTeamLogo'] }}"
                                                                                >
                                                                            <strong><a class="color-bcc9ea"
                                                                                    href="{{ route('teams.matches', [$match['homeTeamId'], str_replace([' ', '_', "'", '&'], '-', strtolower($match['homeTeamName'])), 'league' => $match['leagueId']]) }}">{{ $match['homeTeamName'] }}</a></strong>
                                                                        </div>
                                                                        @if (!in_array($match['shortStatus'], $statusArray))
                                                                            <div class="mscore float-right">
                                                                                <strong>{{ $match['homeTeamGoal'] }}</strong>
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="col-2 no-padding">
                                                                    <div class="lmr-info">
                                                                        @if ($match['shortStatus'] === 'NS')
                                                                            <strong class="color-14844d">
                                                                                {{ date('d/m h:i A', $match['date']) }}
                                                                            </strong>
                                                                        @else
                                                                            <strong class="color-007399">{{ $match['longStatus'] }}</strong>
                                                                        @endif
                                                                        
                                                                        <a href="{{ route('match.detail', [$match['fixtureId'], str_replace(' ', '-', strtolower($match['homeTeamName'] . ' vs ' . $match['awayTeamName']))]) }}"
                                                                            class="mh padding-0-5">

                                                                            {{ 
                                                                                $match['shortStatus'] === 'NS' 
                                                                                ? __('Not Start') 

                                                                                : (in_array($match['fixtureId'], $matchArray) && in_array($match['shortStatus'], $liveStatus) 

                                                                                    ? __('Watch Live') 

                                                                                    : (in_array($match['shortStatus'], $liveStatus) 

                                                                                        ? __('Live') 

                                                                                        : __('Detail'))) 
                                                                            }}
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-5 no-padding">
                                                                    <div class="match-right">
                                                                        @if (!in_array($match['shortStatus'], $statusArray))
                                                                        <div class="mscore">
                                                                            <strong>{{ $match['awayTeamGoal'] }}</strong>
                                                                        </div>
                                                                        @endif
                                                                        <div class="mtl-right"> <img
                                                                                src="{{ $match['awayTeamLogo'] }}"
                                                                                >
                                                                            <strong><a class="color-bcc9ea"
                                                                                    href="{{ route('teams.matches', [$match['awayTeamId'], str_replace([' ', '_', "'", '&'], '-', strtolower($match['awayTeamName'])), 'league' => $match['leagueId']]) }}">{{ $match['awayTeamName'] }}</a></strong>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            @php
                                                $sl++;
                                            @endphp
                                        @endforeach
                                    @endif

                                    <!--Box End-->
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-3 col-md-3">
                        <div class="point-table-widget mb-10">
                            <table>
                                <thead>
                                    <tr>
                                        <th>{{ __('Teams') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="{{ route('teams.matches', [49, 'chelsea']) }}"><img
                                                    src="https://media.api-sports.io/football/teams/49.png" 
                                                 class="img-class">
                                                <strong class="text-align">Chelsea,
                                                    England</strong></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="{{ route('teams.matches', [33, 'manchester-united']) }}"><img
                                                    src="https://media.api-sports.io/football/teams/33.png" 
                                                 class="img-class">
                                                <strong class="text-align">Manchester United,
                                                    England</strong></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="{{ route('teams.matches', [529, 'Barcelona']) }}"><img
                                                    src="https://media.api-sports.io/football/teams/529.png"
                                                     class="img-class">
                                                <strong class="text-align">Barcelona,
                                                    Spain</strong></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="{{ route('teams.matches', [541, 'real-madrid']) }}"><img
                                                    src="https://media.api-sports.io/football/teams/541.png"
                                                     class="img-class">
                                                <strong class="text-align">Real Madrid,
                                                    Spain</strong></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="{{ route('teams.matches', [40, 'liverpool']) }}"><img
                                                    src="https://media.api-sports.io/football/teams/40.png" 
                                                 class="img-class">
                                                <strong class="text-align">Liverpool,
                                                    England</strong></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="{{ route('teams.matches', [42, 'Arsenal']) }}"><img
                                                    src="https://media.api-sports.io/football/teams/42.png" 
                                                 class="img-class">
                                                <strong class="text-align">Arsenal,
                                                    England</strong></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="{{ route('teams.matches', [50, 'manchester-city']) }}"><img
                                                    src="https://media.api-sports.io/football/teams/50.png" 
                                                 class="img-class">
                                                <strong class="text-align">Manchester City,
                                                    England</strong></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="{{ route('teams.matches', [47, 'tottenham']) }}"><img
                                                    src="https://media.api-sports.io/football/teams/47.png" 
                                                 class="img-class">
                                                <strong class="text-align">Tottenham,
                                                    England</strong></a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-center"><a href="{{ route('teams') }}">
                                                <strong>View All</strong></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!--widget start-->
                        <div class="featured-video-widget">
                            
                            @foreach ($videos as $key => $item)
                                <div class="fvideo-box mb15">
                                    <div class="fvid-cap">
                                        <h5><a target="_blank" href="{{ $item->link }}">{{ $item->title }}</a>
                                        </h5>
                                    </div>
                                    <img src="https://img.youtube.com/vi/<?= $item->link ?>/1.jpg" >
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!--Sports Widgets End-->
    </div>
    <!--Main Content End-->

    @section('js')
        <script src="{{ asset('public\assets\front\js\home.min.js') }}"></script>
    @endsection

@endsection
