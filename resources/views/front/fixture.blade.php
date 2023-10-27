@extends('layouts.app')

@section('title', __('Football Scores and Fixtures - FBGOALS'))
@section('content')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
        .carousel-inner {
            height: 100px;
        }

        .carousel-caption {
            color: #fff;
            top: 50%;
            margin-top: 20px;
        }

        span a {
            color: aliceblue;
        }

        span a:hover {
            color: aliceblue;
        }

        .date-design {
            padding: 10px;
            border: 1px solid #171e36;
            border-radius: 2px;
        }

        .carousel-control-next,
        .carousel-control-prev {
            width: 5% !important;
        }

        .carousel-caption {
            right: 0%;
            left: 0%;
        }

        .date-icon {
            color: aliceblue;
            font-size: 25px;
            margin-top: 37px;
            cursor: pointer;
        }

        @media (min-width: 280px) and (max-width: 575px) {
            .date-design {
                border: none !important;
            }

            .date-icon {
                margin-top: 0px;
            }
        }

        @media (max-width: 767px) {
            .date-design {
                border: none !important;
            }

            .date-icon {
                margin-top: 0px;
            }
        }

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
    <!--Main Content Start-->
    <div class="main-content wf100">

        <!--Sports Widgets Start-->
        <section class="wf100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-12">
                        <div id="carouselExampleControls" class="carousel slide" data-interval="false">
                            <div class="carousel-inner">
                                <div class="carousel-item">
                                    <div class="carousel-caption">
                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '-31 days'))]) }}">{{ date('d/M', strtotime($date . '-31 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '-30 days'))]) }}">{{ date('d/M', strtotime($date . '-30 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '-29 days'))]) }}">{{ date('d/M', strtotime($date . '-29 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '-28 days'))]) }}">{{ date('d/M', strtotime($date . '-28 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '-27 days'))]) }}">{{ date('d/M', strtotime($date . '-27 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '-26 days'))]) }}">{{ date('d/M', strtotime($date . '-26 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '-25 days'))]) }}">{{ date('d/M', strtotime($date . '-25 days')) }}</a></span>

                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="carousel-caption">

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '-24 days'))]) }}">{{ date('d/M', strtotime($date . '-24 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '-23 days'))]) }}">{{ date('d/M', strtotime($date . '-23 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '-22 days'))]) }}">{{ date('d/M', strtotime($date . '-22 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '-21 days'))]) }}">{{ date('d/M', strtotime($date . '-21 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '-20 days'))]) }}">{{ date('d/M', strtotime($date . '-20 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '-19 days'))]) }}">{{ date('d/M', strtotime($date . '-19 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '-18 days'))]) }}">{{ date('d/M', strtotime($date . '-18 days')) }}</a></span>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="carousel-caption">
                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '-17 days'))]) }}">{{ date('d/M', strtotime($date . '-17 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '-16 days'))]) }}">{{ date('d/M', strtotime($date . '-16 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '-15 days'))]) }}">{{ date('d/M', strtotime($date . '-15 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '-14 days'))]) }}">{{ date('d/M', strtotime($date . '-14 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '-13 days'))]) }}">{{ date('d/M', strtotime($date . '-13 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '-12 days'))]) }}">{{ date('d/M', strtotime($date . '-12 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '-11 days'))]) }}">{{ date('d/M', strtotime($date . '-11 days')) }}</a></span>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="carousel-caption">
                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '-10 days'))]) }}">{{ date('d/M', strtotime($date . '-10 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '-9 days'))]) }}">{{ date('d/M', strtotime($date . '-9 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '-8 days'))]) }}">{{ date('d/M', strtotime($date . '-8 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '-7 days'))]) }}">{{ date('d/M', strtotime($date . '-7 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '-6 days'))]) }}">{{ date('d/M', strtotime($date . '-6 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '-5 days'))]) }}">{{ date('d/M', strtotime($date . '-5 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '-4 days'))]) }}">{{ date('d/M', strtotime($date . '-4 days')) }}</a></span>
                                    </div>
                                </div>
                                <div class="carousel-item active">
                                    <div class="carousel-caption">
                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '-3 days'))]) }}">{{ date('d/M', strtotime($date . '-3 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '-2 days'))]) }}">{{ date('d/M', strtotime($date . '-2 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '-1 days'))]) }}">{{ date('d/M', strtotime($date . '-1 days')) }}</a></span>

                                        <span class="date-design"><a
                                                style="color: {{ $date == date('Y-m-d', strtotime($date)) ? '#07f585' : '' }}"
                                                href="{{ route('fixtures', ['date' => $date]) }}">{{ date('d/M', strtotime($date)) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '+1 days'))]) }}">{{ date('d/M', strtotime($date . '+1 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '+2 days'))]) }}">{{ date('d/M', strtotime($date . '+2 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '+3 days'))]) }}">{{ date('d/M', strtotime($date . '+3 days')) }}</a></span>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="carousel-caption">

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '+4 days'))]) }}">{{ date('d/M', strtotime($date . '+4 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '+5 days'))]) }}">{{ date('d/M', strtotime($date . '+5 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '+6 days'))]) }}">{{ date('d/M', strtotime($date . '+6 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '+7 days'))]) }}">{{ date('d/M', strtotime($date . '+7 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '+8 days'))]) }}">{{ date('d/M', strtotime($date . '+8 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '+9 days'))]) }}">{{ date('d/M', strtotime($date . '+9 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '+10 days'))]) }}">{{ date('d/M', strtotime($date . '+10 days')) }}</a></span>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="carousel-caption">

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '+11 days'))]) }}">{{ date('d/M', strtotime($date . '+11 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '+12 days'))]) }}">{{ date('d/M', strtotime($date . '+12 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '+13 days'))]) }}">{{ date('d/M', strtotime($date . '+13 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '+14 days'))]) }}">{{ date('d/M', strtotime($date . '+14 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '+15 days'))]) }}">{{ date('d/M', strtotime($date . '+15 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '+16 days'))]) }}">{{ date('d/M', strtotime($date . '+16 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '+17 days'))]) }}">{{ date('d/M', strtotime($date . '+17 days')) }}</a></span>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="carousel-caption">

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '+18 days'))]) }}">{{ date('d/M', strtotime($date . '+18 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '+19 days'))]) }}">{{ date('d/M', strtotime($date . '+19 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '+20 days'))]) }}">{{ date('d/M', strtotime($date . '+20 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '+21 days'))]) }}">{{ date('d/M', strtotime($date . '+21 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '+22 days'))]) }}">{{ date('d/M', strtotime($date . '+22 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '+23 days'))]) }}">{{ date('d/M', strtotime($date . '+23 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '+24 days'))]) }}">{{ date('d/M', strtotime($date . '+24 days')) }}</a></span>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="carousel-caption">

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '+25 days'))]) }}">{{ date('d/M', strtotime($date . '+25 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '+26 days'))]) }}">{{ date('d/M', strtotime($date . '+26 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '+27 days'))]) }}">{{ date('d/M', strtotime($date . '+27 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '+28 days'))]) }}">{{ date('d/M', strtotime($date . '+28 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '+29 days'))]) }}">{{ date('d/M', strtotime($date . '+29 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '+30 days'))]) }}">{{ date('d/M', strtotime($date . '+30 days')) }}</a></span>

                                        <span class="date-design"><a
                                                href="{{ route('fixtures', ['date' => date('Y-m-d', strtotime($date . '+31 days'))]) }}">{{ date('d/M', strtotime($date . '+31 days')) }}</a></span>
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <i class="fas fa-calendar-alt date-icon"></i>
                        <form action="" method="get" id="fixture-form">
                            @csrf
                            <input type="text" id="date" name="date" style="visibility: hidden"
                                onchange="$('#fixture-form').submit()">
                        </form>
                    </div>

                </div>
                <div class="row">
                    @php
                        $statusArray = ['TBD', 'NS', 'PST', 'CANC', 'ABD', 'AWD', 'WO'];
                        $liveStatus = ['1H', 'HT', '2H', 'ET', 'BT', 'P', 'INT', 'LIVE'];
                    @endphp

                    <div class="col-lg-8 col-md-8 col-12">

                        <div class="accordion" id="accordionExample">
                            @if ($fixtures)
                                @foreach ($fixtures as $key => $value)
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
                                                <div class="last-match-result-full-light"
                                                    onclick="redirectToURL('{{ route('match.detail', [$match['fixtureId'], str_replace(' ', '-', strtolower($match['homeTeamName'] . ' vs ' . $match['awayTeamName']))]) }}')">
                                                    <div class="row">
                                                        <div class="col-5 no-padding">
                                                            <div class="match-left">
                                                                <div class="mtl-left"> <img
                                                                        src="{{ $match['homeTeamLogo'] }}" alt="">
                                                                    <strong><a style="color: #bcc9ea;"
                                                                            href="{{ route('teams.matches', [$match['homeTeamId'], str_replace([' ', '_', "'", '&'], '-', strtolower($match['homeTeamName'])), 'league' => $match['leagueId']]) }}">{{ $match['homeTeamName'] }}</a></strong>
                                                                </div>
                                                                @if (!in_array($match['shortStatus'], $statusArray))
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
                                                                @if (in_array($match['shortStatus'], $liveStatus))
                                                                    <strong
                                                                        style="color: #6ed950 !important;font-size: 15px !important;">{{ $match['elapsed'] . '"' }}</strong>
                                                                @endif
                                                                <a href="{{ route('match.detail', [$match['fixtureId'], str_replace(' ', '-', strtolower($match['homeTeamName'] . ' vs ' . $match['awayTeamName']))]) }}"
                                                                    class="mh">{{ in_array($match['fixtureId'], $matchArray) && in_array($match['shortStatus'], $liveStatus) ? __('Watch Live') : $match['longStatus'] }}</a>
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
                                                                        src="{{ $match['awayTeamLogo'] }}" alt="">
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

                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="sidebar">
                            <!--widget start-->
                            @include('front.upcomingMatch')
                            <!--widget end-->
                            <!--widget start-->
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
                            <!--widget end-->
                            <!--widget start-->
                            <div class="widget">
                                <h4>Featured Videos</h4>
                                <div class="featured-video-widget">
                                    @foreach ($videos as $item)
                                        <div class="fvideo-box mb15">
                                            <div class="fvid-cap">
                                                <div class="fvid-right">
                                                    <h5><a href="https://www.youtube.com/watch?v=<?= $item->link ?>"
                                                            target="_blank">{{ $item->title }}</a></h5>
                                                    <span><i class="far fa-clock"></i>
                                                        {{ date('d M, Y', strtotime($item->date)) }} </span>
                                                </div>
                                            </div>
                                            <img src="https://img.youtube.com/vi/<?= $item->link ?>/1.jpg" alt="">
                                        </div>
                                    @endforeach
                                    <div class="buyticket-btn"><a
                                            href="{{ route('videos') }}">{{ __('View All') }}</a>
                                    </div>
                                </div>
                            </div>
                            <!--widget end-->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Sports Widgets End-->
    </div>
    <!--Main Content End-->
@endsection

@section('js')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        $(document).ready(function() {
            $("#date").datepicker();
            $('.date-icon').click(function() {
                $("#date").datepicker('show');
            });
        });
    </script>
@endsection
