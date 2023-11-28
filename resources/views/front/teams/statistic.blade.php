@extends('layouts.app')

@section('title', "$title")
@section('content')

    <!--Main Content Start-->
    <div class="main-content innerpagebg wf100">
        <!--team Page Start-->
        <div class="team wf100 p80">
            <!--Start-->
            <div class="player-squad">
                <div class="container">
                    <div class="row">
                        @if ($ads->where('position', 'top')->first())
                            <div class="col-md-12" style="margin-bottom: 10px;"> 
                                <center>
                                    {!! $ads->where('position', 'top')->first()->ad !!}
                                </center>
                            </div>
                        @endif
                        <!--Fixture Start-->
                        <div class="col-lg-8">
                            @include('front.teams.secondMenu')
                            @if ($statistics)
                                <div class="container">
                                    <div class="match-results-table">
                                        <table>
                                            <tr>
                                                <td>{{ __('Fixture') }}</td>
                                                <td>{{ __('Home') }}</td>
                                                <td>{{ __('Away') }}</td>
                                                <td>{{ __('All') }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Played') }}</td>
                                                <td>{{ $statistics->fixtures->played->home }}</td>
                                                <td>{{ $statistics->fixtures->played->home }}</td>
                                                <td>{{ $statistics->fixtures->played->home }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Wins') }}</td>
                                                <td>{{ $statistics->fixtures->wins->home }}</td>
                                                <td>{{ $statistics->fixtures->wins->home }}</td>
                                                <td>{{ $statistics->fixtures->wins->home }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Draws') }}</td>
                                                <td>{{ $statistics->fixtures->draws->home }}</td>
                                                <td>{{ $statistics->fixtures->draws->home }}</td>
                                                <td>{{ $statistics->fixtures->draws->home }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Loses') }}</td>
                                                <td>{{ $statistics->fixtures->loses->home }}</td>
                                                <td>{{ $statistics->fixtures->loses->home }}</td>
                                                <td>{{ $statistics->fixtures->loses->home }}</td>
                                            </tr>
                                        </table>
                                    </div>

                                    <div class="match-results-table">
                                        <table>
                                            <tr>
                                                <td>{{ __('Penalty') }}</td>
                                                <td>{{ __('Total') }}</td>
                                                <td>{{ __('Percentage') }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Scored') }}</td>
                                                <td>{{ $statistics->penalty->scored->total }}</td>
                                                <td>{{ $statistics->penalty->scored->percentage }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Missed') }}</td>
                                                <td>{{ $statistics->penalty->missed->total }}</td>
                                                <td>{{ $statistics->penalty->missed->percentage }}</td>
                                            </tr>
                                        </table>
                                    </div>

                                    <div class="match-results-table">
                                        <table>
                                            <tr>
                                                <td>{{ __('Goals For') }}</td>
                                                <td>{{ __('Home') }}</td>
                                                <td>{{ __('Away') }}</td>
                                                <td>{{ __('Total') }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Total') }}</td>
                                                <td>{{ $statistics->goals->for->total->home }}</td>
                                                <td>{{ $statistics->goals->for->total->away }}</td>
                                                <td>{{ $statistics->goals->for->total->total }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Total') }}</td>
                                                <td>{{ $statistics->goals->for->average->home }}</td>
                                                <td>{{ $statistics->goals->for->average->away }}</td>
                                                <td>{{ $statistics->goals->for->average->total }}</td>
                                            </tr>

                                        </table>
                                    </div>

                                    <div class="match-results-table">
                                        <table>
                                            <tr>
                                                <td>{{ __('Goals Against') }}</td>
                                                <td>{{ __('Home') }}</td>
                                                <td>{{ __('Away') }}</td>
                                                <td>{{ __('Total') }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Total') }}</td>
                                                <td>{{ $statistics->goals->against->total->home }}</td>
                                                <td>{{ $statistics->goals->against->total->away }}</td>
                                                <td>{{ $statistics->goals->against->total->total }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Total') }}</td>
                                                <td>{{ $statistics->goals->for->average->home }}</td>
                                                <td>{{ $statistics->goals->for->average->away }}</td>
                                                <td>{{ $statistics->goals->for->average->total }}</td>
                                            </tr>

                                        </table>
                                    </div>

                                    <div class="match-results-table">
                                        <table>
                                            <tr>
                                                <td>{{ __('Biggest') }}</td>
                                                <td>{{ __('Wins') }}</td>
                                                <td>{{ __('Draws') }}</td>
                                                <td>{{ __('Loses') }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Streak') }}</td>
                                                <td>{{ $statistics->biggest->streak->wins }}</td>
                                                <td>{{ $statistics->biggest->streak->draws }}</td>
                                                <td>{{ $statistics->biggest->streak->loses }}</td>
                                            </tr>

                                        </table>
                                    </div>

                                    <div class="match-results-table">
                                        <table>
                                            <tr>
                                                <td>{{ __('Yellow Card') }}</td>
                                                <td>{{ __('Total') }}</td>
                                                <td>{{ __('Percentage') }}</td>
                                            </tr>
                                            @foreach ($statistics->cards->yellow as $key => $yellow)
                                                <tr>
                                                    <td>{{ $key }}</td>
                                                    <td>{{ $yellow->total }}</td>
                                                    <td>{{ $yellow->percentage }}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>

                                    <div class="match-results-table">
                                        <table>
                                            <tr>
                                                <td>{{ __('Red Card') }}</td>
                                                <td>{{ __('Total') }}</td>
                                                <td>{{ __('Percentage') }}</td>
                                            </tr>
                                            @foreach ($statistics->cards->red as $key => $red)
                                                <tr>
                                                    <td>{{ $key }}</td>
                                                    <td>{{ $red->total }}</td>
                                                    <td>{{ $red->percentage }}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>

                                </div>
                            @endif
                        </div>
                        <!--Fixture End-->
                        <!--Sidebar Start-->
                        <div class="col-lg-4">
                            <div class="sidebar mb-10">
                                <!--widget start-->
                                @include('front.upcomingMatch')
                                <!--widget end-->
                                @if ($ads->where('position', 'sidebar 1')->first())
                                    <div class="widget">
                                        {!! $ads->where('position', 'sidebar 1')->first()->ad !!}
                                    </div>
                                @endif
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
                                </div>
                            @endif
                            
                            <div class="sidebar">
                                @if ($ads->where('position', 'sidebar 2')->first())
                                    <div class="widget">
                                        {!! $ads->where('position', 'sidebar 2')->first()->ad !!}
                                    </div>
                                @endif
                                @if ($videos->isNotEmpty())
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
                                    </div>
                                </div>
                                <!--widget end-->
                                @endif
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
