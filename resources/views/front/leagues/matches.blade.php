@extends('layouts.app')

@section('title', "$title")
@section('content')
    <style>
        .point-table-widget table thead tr th a {
            color: #bcc9ea;
        }

        .active {
            color: #007bff !important;
        }

        .last-match-result-full-light {
            border: 1px solid #888fa8;
            background: #283151;
            cursor: pointer;
            padding: 5px;
            margin: 0px;
        }

        .match-right .mtl-right {
            width: 130px;
        }

        .match-left .mtl-left {
            width: 107px;
        }

        .lmr-info a.mh {
            padding: 0 5px;
        }

        .last-match-result-full-light .mscore {
            margin-left: 0px;
        }
    </style>

    @php
        $status = ['1H', 'HT', '2H', 'ET', 'FT'];
        $liveStatus = ['1H', 'HT', '2H', 'ET', 'BT', 'P', 'INT', 'LIVE'];
        $leagueId = null;
    @endphp

    <!--Main Content Start-->
    <div class="main-content wf100">

        <!--Sports Widgets Start-->
        <section class="wf100 p80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        @include('front.leagues.secondMenu')
                        <!--pagination-->
                        <div class="row">
                            <div class="gt-pagination">
                                <nav aria-label="Page navigation example">
                                    {{ $matches->links('front.pagination') }}
                                </nav>
                            </div>
                        </div>
                        @if ($matches)
                            @foreach ($matches as $match)
                                @if ($leagueId != $match['leagueId'])
                                    <div class="row">
                                        <div class="col-12">
                                            <nav>
                                                <div class="nav" id="nav-tab" role="tablist">
                                                    <a class="nav-item nav-link nav-active-home" id="nav-1-tab"
                                                        data-toggle="tab" href="#nav-defenders" role="tab"
                                                        aria-controls="nav-defenders" aria-selected="true"
                                                        style="width: 100%; margin: 0px; padding: 5px; font-size: 16px; background: #171e36; color: white; margin-bottom: 10px;">{{ $match['league'] }}</a>
                                                </div>
                                            </nav>
                                        </div>
                                    </div>
                                @endif

                                <div class="last-match-result-full-light"
                                    onclick="redirectToURL('{{ route('match.detail', [$match['fixtureId'], str_replace(' ', '-', strtolower($match['homeTeamName'] . ' vs ' . $match['awayTeamName']))]) }}')">
                                    <div class="row">
                                        <div class="col-5 no-padding">
                                            <div class="match-left">
                                                <div class="mtl-left"> <img src="{{ $match['homeTeamLogo'] }}"
                                                        alt="">
                                                    <strong><a style="color: #bcc9ea;"
                                                            href="{{ route('teams.matches', [$match['homeTeamId'], str_replace([' ', '_', "'", '&'], '-', strtolower($match['homeTeamName'])), 'league' => $match['leagueId']]) }}">{{ $match['homeTeamName'] }}</a></strong>
                                                </div>
                                                @if (in_array($match['shortStatus'], $status))
                                                    <div class="mscore" style="float: right">
                                                        <strong>{{ $match['homeTeamGoal'] }}</strong>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-2 no-padding">
                                            <div class="lmr-info">
                                                @if ($match['shortStatus'] === 'NS')
                                                    <strong style="color: #14844d !important;">
                                                        {{ date('d/m  h:i A', $match['date']) }} </strong>
                                                @endif

                                                @if (in_array($match['shortStatus'], $status))
                                                    <strong
                                                        style="color: #6ed950 !important;font-size: 15px !important;">{{ $match['elapsed'] . '"' }}</strong>
                                                @endif

                                                <a href="{{ route('match.detail', [$match['fixtureId'], str_replace(' ', '-', strtolower($match['homeTeamName'] . ' vs ' . $match['awayTeamName']))]) }}"
                                                    class="mh">{{ in_array($match['fixtureId'], $matchArray) && in_array($match['shortStatus'], $liveStatus) ? __('Watch Live') : $match['longStatus'] }}</a>

                                            </div>
                                        </div>
                                        <div class="col-5 no-padding">
                                            <div class="match-right">
                                                @if (in_array($match['shortStatus'], $status))
                                                    <div class="mscore">
                                                        <strong>{{ $match['awayTeamGoal'] }}</strong>
                                                    </div>
                                                @endif
                                                <div class="mtl-right"> <img src="{{ $match['awayTeamLogo'] }}"
                                                        alt="">
                                                    <strong><a style="color: #bcc9ea;"
                                                            href="{{ route('teams.matches', [$match['awayTeamId'], str_replace([' ', '_', "'", '&'], '-', strtolower($match['awayTeamName'])), 'league' => $match['leagueId']]) }}">{{ $match['awayTeamName'] }}</a></strong>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $leagueId = $match['leagueId'];
                                @endphp
                            @endforeach
                        @endif

                    </div>
                    <!--Sidebar Start-->
                    <div class="col-lg-4">
                        <div class="sidebar" style="margin-bottom: 10px;">
                            <!--widget start-->
                            @include('front.upcomingMatch')
                            <!--widget end-->
                        </div>
                        @if ($news->isNotEmpty())
                            <div class="h3-section-title"> <strong>{{ __('Trending News') }}</strong></div>
                            <div class="trending-news">
                                @foreach ($news as $key => $item)
                                    <!--Expand-->
                                    <div class="list-box-expand <?= $key == 0 ? 'active' : '' ?>">
                                        <div class="news-caption">
                                            <div class="news-txt">
                                                <h4><a
                                                        href="{{ route('news.detail', [$item->id, str_replace([' ', '_', '&'], '-', strtolower($item->title))]) }}">{{ $item->title }}</a>
                                                </h4>
                                                <ul class="news-meta">
                                                    <li><i class="fas fa-calendar-alt"></i>
                                                        {{ date('D M, Y', strtotime($item->date)) }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="expand-news-img"><img
                                                src="{{ file_exists($item->photo) ? asset($item->photo) : asset('public/images/news.jpg') }}"
                                                alt=""></div>
                                    </div>
                                    <!--Expand-->
                                @endforeach
                                <div class="buyticket-btn"><a
                                        href="{{ route('league.news', ['league' => $league, 'name' => $name]) }}">{{ __('View All') }}</a>
                                </div>

                            </div>
                        @endif
                        @if ($videos->isNotEmpty())
                            <div class="sidebar">
                                <!--widget start-->
                                <div class="widget">
                                    <h4>{{ __('Featured Videos') }} </h4>
                                    <div class="featured-video-widget">
                                        @foreach ($videos as $item)
                                            <div class="fvideo-box mb15">
                                                <div class="fvid-cap">
                                                    <h5><a
                                                            href="https://www.youtube.com/watch?v=<?= $item->link ?>">{{ $item->title }}</a>
                                                    </h5>
                                                    <span><i class="far fa-clock"></i>
                                                        {{ date('d M, Y', strtotime($item->date)) }} </span>
                                                </div>
                                                <img src="https://img.youtube.com/vi/<?= $item->link ?>/1.jpg"
                                                    alt="">
                                                <h5><a
                                                        href="https://www.youtube.com/watch?v=<?= $item->link ?>">{{ $item->title }}</a>
                                                </h5>
                                            </div>
                                        @endforeach
                                        <div class="buyticket-btn"><a
                                                href="{{ route('league.videos', ['league' => $league, 'name' => $name]) }}">{{ __('View All') }}</a>
                                        </div>
                                    </div>
                                </div>
                                <!--widget end-->
                            </div>
                        @endif
                    </div>
                    <!--Sidebar End-->
                </div>
            </div>
        </section>
        <!--Sports Widgets End-->
    </div>
    <!--Main Content End-->
@endsection
