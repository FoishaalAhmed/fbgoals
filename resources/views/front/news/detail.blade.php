@extends('layouts.app')

@section('title', 'News detail')
@section('content')
    <!--Main Content Start-->
    <div class="main-content innerpagebg wf100 p80">
        <!--News Large Page Start-->
        <!--Start-->
        <div class="news-details">
            <div class="container">
                <div class="row">
                    <!--News Start-->
                    <div class="col-lg-8">
                        <div class="news-details-wrap">
                            <div class="news-large-post">
                                <div class="post-thumb mb-20"> 
                                    <img src="{{ asset($news->photo) }}" alt=""> 
                                </div>
                                <div class="post-text cwit-p10">
                                    {!! $news->content !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--News End-->
                    <!--Sidebar Start-->
                    <div class="col-lg-4">
                        <div class="sidebar mb-10" style="margin-bottom: 10px;">
                            <!--widget start-->
                            @include('front.upcomingMatch')
                            <!--widget end-->
                        </div>
                        <div class="h3-section-title"> <strong>{{ __('Trending News') }}</strong></div>
                        <div class="trending-news">
                            @foreach ($latestNews as $key => $item)
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
                                            <img src="https://img.youtube.com/vi/<?= $item->link ?>/1.jpg" alt="">
                                        </div>
                                    @endforeach
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
