@extends('layouts.app')

@section('title', __('Live Matches'))
@section('content')

    <style>
        .accordion .item {
            border: none;
            background: none;
        }

        .t-p {
            color: rgb(193 206 216);
            padding: 40px 30px 0px 30px;
        }

        .accordion .item .item-header h2 button.btn.btn-link {
            background: #171e36;
            color: white;
            border-radius: 0px;
            font-family: 'Poppins';
            font-size: 16px;
            font-weight: 400;
            line-height: 2.5;
            text-decoration: none;
        }

        .accordion .item .item-header {
            border-bottom: none;
            background: transparent;
            padding: 0px;
            margin: 2px;
        }

        .accordion .item .item-header h2 button {
            color: white;
            font-size: 20px;
            padding: 5px;
            display: block;
            width: 100%;
            text-align: left;
        }

        .accordion .item .item-header h2 i {
            float: right;
            font-size: 30px;
            color: #eca300;
            background-color: #171e36;
            width: 60px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 5px;
        }

        button.btn.btn-link.collapsed i {
            transform: rotate(0deg);
        }

        button.btn.btn-link i {
            transform: rotate(180deg);
            transition: 0.5s;
        }

        .last-match-result-full-light {
            padding: 5px;
            margin: 0px;
        }

        .last-match-result-full-light .match-left .mtl-left img,
        .last-match-result-full-light .match-right .mtl-right img {
            width: 30px;
        }

        .match-right .mtl-right {
            width: 105px;
        }

        .match-left .mtl-left {
            width: 107px;
        }

        .last-match-result-full-light {
            border: 1px solid #888fa8;
            background: #283151;
            cursor: pointer;
        }
    </style>

    <!--Main Content Start-->
    <div class="main-content innerpagebg wf100">
        <!--team Page Start-->
        <div class="team wf100 p40">
            <!--Start-->
            <div class="player-squad">
                <div class="container">

                    <div class="row">
                        <!--Fixture Start-->
                        <div class="col-lg-8">
                            <div class="container">

                                <div class="accordion" id="accordionExample">
                                    @php
                                        $liveStatus = ['1H', 'HT', '2H', 'ET', 'BT', 'P', 'INT', 'LIVE'];
                                    @endphp

                                    @if ($matches)
                                        @foreach ($matches as $key => $value)
                                            <div class="item">

                                                <div class="item-header" id="<?= $key ?>">
                                                    <h2 class="mb-20">
                                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                                            data-target="#collapseOne<?= $key ?>" aria-expanded="true"
                                                            aria-controls="collapseOne<?= $key ?>">
                                                            {{ $value['league'] }}
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                    </h2>
                                                </div>

                                                <div id="collapseOne<?= $key ?>"
                                                    class="collapse {{ in_array($value['leagueid'], $fixedLeagues) ? 'show' : '' }}"
                                                    aria-labelledby="headingOne<?= $key ?>" data-parent="#accordionExample">
                                                    @foreach ($value['matches'] as $match)
                                                        <div class="last-match-result-full-light" onclick="redirectToURL('{{ route('match.detail', [$match['fixtureId'], str_replace(' ', '-', strtolower($match['homeTeamName'] . ' vs ' . $match['awayTeamName']))]) }}')">
                                                            <div class="row">
                                                                <div class="col-5 no-padding">
                                                                    <div class="match-left">
                                                                        <div class="mtl-left"> <img
                                                                                src="{{ $match['homeTeamLogo'] }}"
                                                                                alt="">
                                                                            <strong><a style="color: #bcc9ea;"
                                                                                    href="{{ route('teams.matches', [$match['homeTeamId'], str_replace([' ', '_', "'", '&'], '-', strtolower($match['homeTeamName'])), 'league' => $match['leagueId']]) }}">{{ $match['homeTeamName'] }}</a></strong>
                                                                        </div>
                                                                        <div class="mscore" style="float: right">
                                                                            <strong>{{ $match['homeTeamGoal'] }}</strong>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="col-2 no-padding">
                                                                    <div class="lmr-info">
                                                                        <strong
                                                                            style="color: #6ed950 !important;font-size: 15px !important;">{{ $match['elapsed'] . '"' }}</strong>
                                                                        <a href="{{ route('match.detail', [$match['fixtureId'], str_replace(' ', '-', strtolower($match['homeTeamName'] . ' vs ' . $match['awayTeamName']))]) }}"
                                                                            class="mh">{{ in_array($match['fixtureId'], $matchArray) && in_array($match['shortStatus'], $liveStatus) ? __('Watch Live') : __('Live') }}</a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-5 no-padding">
                                                                    <div class="match-right">
                                                                        <div class="mscore">
                                                                            <strong>{{ $match['awayTeamGoal'] }}</strong>
                                                                        </div>
                                                                        <div class="mtl-right"> <img
                                                                                src="{{ $match['awayTeamLogo'] }}"
                                                                                alt="">
                                                                            <strong><a style="color: #bcc9ea;"
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
                                    @endif

                                </div>
                            </div>
                        </div>
                        <!--Fixture End-->
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
                                    <div class="buyticket-btn"><a href="{{ route('news') }}">{{ __('View All') }}</a>
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
                                                </div>
                                            @endforeach
                                            <div class="buyticket-btn"><a
                                                    href="{{ route('videos') }}">{{ __('View All') }}</a>
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
            </div>
            <!--End-->
        </div>
        <!--team Page End-->
    </div>
    <!--Main Content End-->

@endsection

@section('js')
    <script>
        function redirectToURL(url) {
            window.location.href = url;
        }
    </script>
@endsection
