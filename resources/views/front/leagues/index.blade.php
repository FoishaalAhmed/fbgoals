@extends('layouts.app')

@section('title', __('Football Top Leagues - FBGOALS'))
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
                                    @if ($leagues)
                                        @foreach ($leagues as $item)
                                            <!--col start-->
                                            <div class="col-lg-6 p-10">
                                                <a
                                                    href="{{ route('leagues.matches', [$item['id'], str_replace([' ', '_', '&'], '-', strtolower($item['name']))]) }}">
                                                    <div class="next-match-fixtures">
                                                        <ul class="match-teams-vs">
                                                            <li class="team-logo"><img src="{{ $item['logo'] }}"
                                                                    alt="" style="width: 50px; height: 50px;">
                                                            </li>
                                                            <li class="mvs">
                                                                <p><strong>{{ $item['name'] . ', ' . $item['country'] }}</strong>
                                                                </p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </a>
                                            </div>
                                            <!--col end-->
                                        @endforeach
                                    @endif

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
