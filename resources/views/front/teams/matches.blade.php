@extends('layouts.app')

@section('title', "$title")

@section('css')
    <link rel="stylesheet" href="{{ asset('public/assets/front/css/teammatch.min.css') }}">
@endsection

@section('content')

    @php
        $status = ['1H', 'HT', '2H', 'ET', 'FT'];
        $liveStatus = ['1H', 'HT', '2H', 'ET', 'BT', 'P', 'INT', 'LIVE'];
    @endphp

    <!--Main Content Start-->
    <div class="main-content wf100">

        <!--Sports Widgets Start-->
        <section class="wf100 p80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        @include('front.teams.secondMenu')
                        <!--Next Match Widget Start-->
                        <div class="row">
                            <div class="gt-pagination">
                                <nav aria-label="Page navigation example">
                                    {{ $matches->links('front.pagination') }}
                                </nav>
                            </div>
                        </div>

                        <div class="accordion" id="accordionExample">
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
                                                                @if (in_array($match['shortStatus'], $status))
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
                                                                @if (in_array($match['shortStatus'], $status))
                                                                    <strong  class="color-6ed950-font-15">{{ $match['elapsed'] . '"' }}</strong>
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
                                                                <div class="mtl-right"> <img
                                                                        src="{{ $match['awayTeamLogo'] }}" alt="">
                                                                    <strong><a class="color-bcc9ea;"
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
                    <!--Sidebar Start-->
                    <div class="col-lg-4">
                        <div class="sidebar mb-10">
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
                                <div class="buyticket-btn"><a
                                        href="{{ route('team.news', ['team' => $teamId, 'name' => $name]) }}">{{ __('View All') }}</a>
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
                                                    <span><i class="fe-clock"></i>
                                                        {{ date('d M, Y', strtotime($item->date)) }} </span>
                                                </div>
                                                <img src="https://img.youtube.com/vi/<?= $item->link ?>/1.jpg"
                                                    alt="">
                                            </div>
                                        @endforeach
                                        <div class="buyticket-btn"><a
                                                href="{{ route('team.videos', ['team' => $teamId, 'name' => $name]) }}">{{ __('View All') }}</a>
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
