@extends('layouts.app')

@section('title', __('Football Teams - FBGOALS'))
@section('content')
    <style>
        .next-match-fixtures .mvs p {
            margin-top: 15px;
        }
    </style>
    <!--Main Content Start-->
    <div class="main-content innerpagebg wf100">
        <!--team Page Start-->
        <div class="team wf100 p80">
            <!--Start-->
            <div class="player-squad">
                <div class="container">
                    <div class="row">
                        <!--Fixture Start-->
                        <div class="col-lg-8">
                            <!--Mathes Grid-->
                            <div class="fixtures-light fixtures-grid np">
                                <div class="row">
                                    <!--col start-->
                                    <div class="col-lg-6 p-10">
                                        <a href="{{ route('teams.matches', [49, 'chelsea']) }}">
                                            <div class="next-match-fixtures">
                                                <ul class="match-teams-vs">
                                                    <li class="team-logo"><img
                                                            src="https://media.api-sports.io/football/teams/49.png"
                                                            alt="" style="width: 50px; height: 50px;">
                                                    </li>
                                                    <li class="mvs">
                                                        <p><strong>{{ __('Chelsea, England') }}</strong>
                                                        </p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </a>
                                    </div>
                                    <!--col end-->
                                    <!--col start-->
                                    <div class="col-lg-6 p-10">
                                        <a href="{{ route('teams.matches', [33, 'manchester-united']) }}">
                                            <div class="next-match-fixtures">
                                                <ul class="match-teams-vs">
                                                    <li class="team-logo"><img
                                                            src="https://media.api-sports.io/football/teams/33.png"
                                                            alt="" style="width: 50px; height: 50px;">
                                                    </li>
                                                    <li class="mvs">
                                                        <p><strong>{{ __('Manchester United, England') }}</strong>
                                                        </p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </a>
                                    </div>
                                    <!--col end-->
                                    <!--col start-->
                                    <div class="col-lg-6 p-10">
                                        <a href="{{ route('teams.matches', [529, 'Barcelona']) }}">
                                            <div class="next-match-fixtures">
                                                <ul class="match-teams-vs">
                                                    <li class="team-logo"><img
                                                            src="https://media.api-sports.io/football/teams/529.png"
                                                            alt="" style="width: 50px; height: 50px;">
                                                    </li>
                                                    <li class="mvs">
                                                        <p><strong>{{ __('Barcelona, Spain') }}</strong>
                                                        </p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </a>
                                    </div>
                                    <!--col end-->
                                    <!--col start-->
                                    <div class="col-lg-6 p-10">
                                        <a href="{{ route('teams.matches', [541, 'real-madrid']) }}">
                                            <div class="next-match-fixtures">
                                                <ul class="match-teams-vs">
                                                    <li class="team-logo"><img
                                                            src="https://media.api-sports.io/football/teams/541.png"
                                                            alt="" style="width: 50px; height: 50px;">
                                                    </li>
                                                    <li class="mvs">
                                                        <p><strong>{{ __('Real Madrid,
                                                                                                                                                                    Spain') }}</strong>
                                                        </p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </a>
                                    </div>
                                    <!--col end-->
                                    <!--col start-->
                                    <div class="col-lg-6 p-10">
                                        <a href="{{ route('teams.matches', [40, 'liverpool']) }}">
                                            <div class="next-match-fixtures">
                                                <ul class="match-teams-vs">
                                                    <li class="team-logo"><img
                                                            src="https://media.api-sports.io/football/teams/40.png"
                                                            alt="" style="width: 50px; height: 50px;">
                                                    </li>
                                                    <li class="mvs">
                                                        <p><strong>{{ __('Liverpool,
                                                                                                                                                                    England') }}</strong>
                                                        </p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </a>
                                    </div>
                                    <!--col end-->
                                    <!--col start-->
                                    <div class="col-lg-6 p-10">
                                        <a href="{{ route('teams.matches', [42, 'Arsenal']) }}">
                                            <div class="next-match-fixtures">
                                                <ul class="match-teams-vs">
                                                    <li class="team-logo"><img
                                                            src="https://media.api-sports.io/football/teams/42.png"
                                                            alt="" style="width: 50px; height: 50px;">
                                                    </li>
                                                    <li class="mvs">
                                                        <p><strong>{{ __('Arsenal,
                                                                                                                                                                    England') }}</strong>
                                                        </p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </a>
                                    </div>
                                    <!--col end-->
                                    <!--col start-->
                                    <div class="col-lg-6 p-10">
                                        <a href="{{ route('teams.matches', [50, 'manchester-city']) }}">
                                            <div class="next-match-fixtures">
                                                <ul class="match-teams-vs">
                                                    <li class="team-logo"><img
                                                            src="https://media.api-sports.io/football/teams/50.png"
                                                            alt="" style="width: 50px; height: 50px;">
                                                    </li>
                                                    <li class="mvs">
                                                        <p><strong>{{ __('Manchester City,
                                                                                                                                                                    England') }}</strong>
                                                        </p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </a>
                                    </div>
                                    <!--col end-->
                                    <!--col start-->
                                    <div class="col-lg-6 p-10">
                                        <a href="{{ route('teams.matches', [47, 'tottenham']) }}">
                                            <div class="next-match-fixtures">
                                                <ul class="match-teams-vs">
                                                    <li class="team-logo"><img
                                                            src="https://media.api-sports.io/football/teams/47.png"
                                                            alt="" style="width: 50px; height: 50px;">
                                                    </li>
                                                    <li class="mvs">
                                                        <p><strong>{{ __('Tottenham,
                                                                                                                                                                    England') }}</strong>
                                                        </p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </a>
                                    </div>
                                    <!--col end-->
                                    <!--col start-->
                                    <div class="col-lg-6 p-10">
                                        <a href="{{ route('teams.matches', [52, 'crystal-palace']) }}">
                                            <div class="next-match-fixtures">
                                                <ul class="match-teams-vs">
                                                    <li class="team-logo"><img
                                                            src="https://media.api-sports.io/football/teams/52.png"
                                                            alt="" style="width: 50px; height: 50px;">
                                                    </li>
                                                    <li class="mvs">
                                                        <p><strong>{{ __('Crystal Palace,
                                                                                                                                                                    England') }}</strong>
                                                        </p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </a>
                                    </div>
                                    <!--col end-->
                                    <!--col start-->
                                    <div class="col-lg-6 p-10">
                                        <a href="{{ route('teams.matches', [85, 'paris-saint-ermain']) }}">
                                            <div class="next-match-fixtures">
                                                <ul class="match-teams-vs">
                                                    <li class="team-logo"><img
                                                            src="https://media.api-sports.io/football/teams/85.png"
                                                            alt="" style="width: 50px; height: 50px;">
                                                    </li>
                                                    <li class="mvs">
                                                        <p><strong>{{ __('Paris Saint Germain, France') }}</strong>
                                                        </p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </a>
                                    </div>
                                    <!--col end-->
                                    <!--col start-->
                                    <div class="col-lg-6 p-10">
                                        <a href="{{ route('teams.matches', [496, 'juventus']) }}">
                                            <div class="next-match-fixtures">
                                                <ul class="match-teams-vs">
                                                    <li class="team-logo"><img
                                                            src="https://media.api-sports.io/football/teams/496.png"
                                                            alt="" style="width: 50px; height: 50px;">
                                                    </li>
                                                    <li class="mvs">
                                                        <p><strong>{{ __('Juventus,
                                                                                                                                                                    Italy') }}</strong>
                                                        </p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </a>
                                    </div>
                                    <!--col end-->
                                    <!--col start-->
                                    <div class="col-lg-6 p-10">
                                        <a href="{{ route('teams.matches', [492, 'napoli']) }}">
                                            <div class="next-match-fixtures">
                                                <ul class="match-teams-vs">
                                                    <li class="team-logo"><img
                                                            src="https://media.api-sports.io/football/teams/492.png"
                                                            alt="" style="width: 50px; height: 50px;">
                                                    </li>
                                                    <li class="mvs">
                                                        <p><strong>{{ __('Napoli,
                                                                                                                                                                    Italy') }}</strong>
                                                        </p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </a>
                                    </div>
                                    <!--col end-->
                                    <!--col start-->
                                    <div class="col-lg-6 p-10">
                                        <a href="{{ route('teams.matches', [489, 'ac-milan']) }}">
                                            <div class="next-match-fixtures">
                                                <ul class="match-teams-vs">
                                                    <li class="team-logo"><img
                                                            src="https://media.api-sports.io/football/teams/489.png"
                                                            alt="" style="width: 50px; height: 50px;">
                                                    </li>
                                                    <li class="mvs">
                                                        <p><strong>{{ __('AC Milan,
                                                                                                                                                                    Italy') }}</strong>
                                                        </p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </a>
                                    </div>
                                    <!--col end-->
                                    <!--col start-->
                                    <div class="col-lg-6 p-10">
                                        <a href="{{ route('teams.matches', [505, 'tnter']) }}">
                                            <div class="next-match-fixtures">
                                                <ul class="match-teams-vs">
                                                    <li class="team-logo"><img
                                                            src="https://media.api-sports.io/football/teams/505.png"
                                                            alt="" style="width: 50px; height: 50px;">
                                                    </li>
                                                    <li class="mvs">
                                                        <p><strong>{{ __('Inter, Italy') }}</strong>
                                                        </p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </a>
                                    </div>
                                    <!--col end-->
                                </div>
                            </div>
                            <!--Mathes Grid-->
                        </div>
                        <!--Fixture End-->
                        <!--Sidebar Start-->
                        <div class="col-lg-4">
                            <div class="sidebar" style="margin-bottom: 10px;">
                                <!--widget start-->
                                @include('front.upcomingMatch')
                                <!--widget end-->
                            </div>
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
                                <div class="buyticket-btn"><a href="{{ route('news') }}">{{ __('View All') }}</a></div>

                            </div>
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
                                                href="{{ route('videos') }}">{{ __('View All') }}</a></div>
                                    </div>
                                </div>
                                <!--widget end-->
                            </div>
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
