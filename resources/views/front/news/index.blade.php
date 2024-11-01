@extends('layouts.app')

@section('title', __('Football News'))
@section('content')
    <!--Main Content Start-->
    <div class="main-content innerpagebg wf100 p80">
        <!--News / Blog Start-->
        <div class="news-grid">
            <div class="container">
                <div class="row">
                    @if ($ads->where('position', 'top')->first())
                            <div class="col-md-12 mb-10"> 
                                <center>
                                    {!! $ads->where('position', 'top')->first()->ad !!}
                                </center>
                            </div>
                        @endif
                    <div class="col-lg-8">
                        <div class="row">
                            @foreach ($news as $item)
                                <!--Box Start-->
                                <div class="col-lg-6 col-md-6">
                                    <div class="ng-box">
                                        <div class="thumb">
                                            <a
                                                href="{{ route('news.detail', [$item->id, str_replace([' ', '_', '&'], '-', strtolower($item->title))]) }}"><i
                                                    class="fe-link"></i></a>
                                            <img src="{{ asset($item->photo) }}" alt="" style="height: 240px;">
                                        </div>
                                        <div class="ng-txt">
                                            <h4><a
                                                    href="{{ route('news.detail', [$item->id, str_replace([' ', '_', '&'], '-', strtolower($item->title))]) }}">{{ $item->title }}</a>
                                            </h4>
                                            <ul class="post-meta">
                                                <li><i class="fe-calendar"></i>
                                                    {{ date('d M, Y', strtotime($item->date)) }}</li>
                                            </ul>
                                            <p>{{ Str::limit(strip_tags($item->content), 100) }}</p>
                                            <br><br>
                                            <a href="{{ route('news.detail', [$item->id, str_replace([' ', '_', '&'], '-', strtolower($item->title))]) }}"
                                                class="rm">{{ __('Read More') }}</a>
                                        </div>
                                    </div>
                                </div>
                                <!--Box End-->
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="gt-pagination">
                                <nav aria-label="Page navigation example">
                                    {{ $news->appends(['league' => request()->league, 'name' => request()->name])->links('front.pagination') }}
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!--Sidebar Start-->
                    <div class="col-lg-4">
                        <div class="sidebar">
                            <!--widget start-->
                            @include('front.upcomingMatch')
                            <!--widget end-->
                            @if ($ads->where('position', 'sidebar 1')->first())
                                <div class="widget">
                                    {!! $ads->where('position', 'sidebar 1')->first()->ad !!}
                                </div>
                            @endif
                            <!--widget start-->
                            <div class="widget">
                                <h4>{{ __('Featured Videos') }}</h4>
                                <div class="featured-video-widget">

                                    @php
                                        $firstThree = array_slice($videos, 0, 3);
                                        $lastTwo = array_slice($videos, 3, 2);
                                    @endphp

                                    @foreach ($firstThree as $item)
                                        <div class="fvideo-box mb15">
                                            <div class="fvid-cap">
                                                <h5><a href="https://www.youtube.com/watch?v=<?= $item['link'] ?>"
                                                        target="_blank">{{ $item['title'] }}</a></h5>
                                                <span><i class="fe-clock"></i>
                                                    {{ date('d M, Y', strtotime($item['date'])) }} </span>
                                            </div>
                                            <img src="https://img.youtube.com/vi/<?= $item['link'] ?>/1.jpg" alt="">
                                        </div>
                                    @endforeach
                                    @foreach ($lastTwo as $item)
                                        <div class="fvideo-box mb15">
                                            <div class="fvid-cap">
                                                <h5><a href="https://www.youtube.com/watch?v=<?= $item['link'] ?>"
                                                        target="_blank">{{ $item['title'] }}</a></h5>
                                                <span><i class="fe-clock"></i>
                                                    {{ date('d M, Y', strtotime($item['date'])) }} </span>
                                            </div>
                                            <img src="https://img.youtube.com/vi/<?= $item['link'] ?>/1.jpg" alt="">
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                            <!--widget end-->
                            @if ($ads->where('position', 'sidebar 2')->first())
                                <div class="widget">
                                    {!! $ads->where('position', 'sidebar 2')->first()->ad !!}
                                </div>
                            @endif
                        </div>
                    </div>
                    <!--Sidebar End-->
                </div>

            </div>
        </div>
        <!--News / Blog End-->
    </div>
    <!--Main Content End-->
@endsection
