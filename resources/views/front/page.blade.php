@extends('layouts.app')

@section('title', "$page->title")
@section('content')
    <!--Main Content Start-->
    <div class="main-content innerpagebg wf100 p80">
        <!--News Large Page Start-->
        <!--Start-->
        <div class="news-details">
            <div class="container">
                <div class="row">
                    @if ($ads->where('position', 'top')->first())
                        <div class="col-md-12" style="margin-bottom: 10px;"> 
                            <center>
                                {!! $ads->where('position', 'top')->first()->ad !!}
                            </center>
                        </div>
                    @endif
                    <!--News Start-->
                    <div class="col-lg-8">
                        @if ($page)      
                        <div class="news-details-wrap">
                            <div class="news-large-post">
                                @if (file_exists($page->photo))
                                    <div class="post-thumb"> <img src="{{ asset($page->photo) }}" alt=""></div>
                                @endif

                                <div class="post-txt">
                                    <h3>{{ $page->title }}</h3>
                                    {!! $page->content !!}
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    <!--News End-->
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
                            <div class="buyticket-btn"><a href="{{ route('news') }}">{{ __('View All') }}</a></div>

                        </div>

                        <div class="sidebar">
                             @if ($ads->where('position', 'sidebar 2')->first())
                                <div class="widget">
                                    {!! $ads->where('position', 'sidebar 2')->first()->ad !!}
                                </div>
                            @endif
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
                                            <img src="https://img.youtube.com/vi/<?= $item->link ?>/1.jpg" alt="">

                                        </div>
                                    @endforeach
                                    <div class="buyticket-btn"><a href="{{ route('videos') }}">{{ __('View All') }}</a>
                                    </div>
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
    <!--Main Content End-->
@endsection
