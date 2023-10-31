@extends('layouts.app')

@section('title', __('Football Scores and Fixtures - FBGOALS'))

@section('css')
    <link rel="stylesheet" href="{{ asset('public/assets/front/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/front/css/fixture.min.css') }}">
@endsection

@section('content')
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
                                <span class="sr-only">{{ __('Previous') }}</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">{{ __('Next') }}</span>
                            </a>
                        </div>
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
                                                    <i class="fe-chevron-down"></i>
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
                                                                        {{ date('d/m  h:i A', $match['date']) }} </strong>
                                                                @endif
                                                                @if (in_array($match['shortStatus'], $liveStatus))
                                                                    <strong
                                                                        class="color-6ed950-font-15">{{ $match['elapsed'] . '"' }}</strong>
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
                                                    <li><i class="fe-calendar"></i>
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
                                                    <span><i class="fe-clock"></i>
                                                        {{ date('d M, Y', strtotime($item->date)) }} </span>
                                                </div>
                                            </div>
                                            <img src="https://img.youtube.com/vi/<?= $item->link ?>/1.jpg" alt="">
                                        </div>
                                    @endforeach
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
