@extends('layouts.app')

@section('title', "$title")
@section('content')
    <!--Main Content Start-->
    <div class="main-content wf100">

        <!--Sports Widgets Start-->
        <section class="wf100 p80">
            <div class="container">
                <div class="row">
                    <!--Sidebar End-->
                    <div class="col-lg-8">
                        @include('front.leagues.secondMenu')
                        <!--Start-->
                        <div class="point-table">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="point-table-widget">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>P</th>
                                                        <th>Team</th>
                                                        <th>P</th>
                                                        <th>W</th>
                                                        <th>D</th>
                                                        <th>L</th>
                                                        <th>Pts</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($leagues)
                                                        @foreach ($leagues[0]->league->standings[0] as $standing)
                                                            <tr>
                                                                <td>{{ $standing->rank }}</td>
                                                                <td><img src="{{ $standing->team->logo }}" alt=""
                                                                        style="width: 28px; height: 24px;">
                                                                    <strong>{{ $standing->team->name }}</strong>
                                                                </td>
                                                                <td>{{ $standing->all->played }}</td>
                                                                <td>{{ $standing->all->win }}</td>
                                                                <td>{{ $standing->all->draw }}</td>
                                                                <td>{{ $standing->all->lose }}</td>
                                                                <td><strong>{{ $standing->points }}</strong></td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End-->

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
                                                <h5><a href="https://www.youtube.com/watch?v=<?= $item->link ?>">{{ $item->title }}</a></h5>
                                                <span><i class="far fa-clock"></i>
                                                    {{ date('d M, Y', strtotime($item->date)) }} </span>
                                            </div>
                                            <img src="https://img.youtube.com/vi/<?= $item->link ?>/1.jpg" alt="">
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
