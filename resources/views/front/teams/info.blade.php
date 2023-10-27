@extends('layouts.app')

@section('title', "$title")
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
                             @include('front.teams.secondMenu')
                            <!--Mathes Grid-->
                            @if ($team)
                                <div class="point-table-widget">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>{{ __('Name') }}</td>
                                                <td>:</td>
                                                <td><img src="{{ $team[0]->team->logo }}" alt="" style="width: 50px;">
                                                    <strong>{{ $team[0]->team->name }}</strong>
                                                </td>
                                            <tr>
                                                <td>{{ __('Code') }}</td>
                                                <td>:</td>
                                                <td><strong>{{ $team[0]->team->code }}</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Country') }}</td>
                                                <td>:</td>
                                                <td><strong>{{ $team[0]->team->country }}</strong></td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Founded') }}</td>
                                                <td>:</td>
                                                <td><strong>{{ $team[0]->team->founded }}</strong></td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Venue') }}</td>
                                                <td>:</td>
                                                <td><strong>{{ $team[0]->venue->name }}</strong></td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Address') }}</td>
                                                <td>:</td>
                                                <td><strong>{{ $team[0]->venue->address . ', ' . $team[0]->venue->city }}</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Capacity') }}</td>
                                                <td>:</td>
                                                <td><strong>{{ $team[0]->venue->capacity }}</strong></td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Surface') }}</td>
                                                <td>:</td>
                                                <td><strong>{{ $team[0]->venue->surface }}</strong></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            @endif

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
                                                        <span><i class="far fa-clock"></i>
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
            </div>
            <!--End-->
        </div>
        <!--team Page End-->
    </div>
    <!--Main Content End-->
@endsection
