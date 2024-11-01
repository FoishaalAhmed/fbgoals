@extends('layouts.app')

@section('title', __('Football Videos'))
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
                            @foreach ($videos as $item)
                                <!--Box Start-->
                                <div class="col-lg-6 col-md-6">
                                    <div class="ng-box">
                                        <div class="thumb">
                                            <a href="https://www.youtube.com/watch?v=<?= $item->link ?>" target="_blank"><i
                                                    class="fe-link"></i></a>
                                            <img src="https://img.youtube.com/vi/<?= $item->link ?>/1.jpg" alt=""
                                                class="height-240">
                                        </div>
                                        <div class="ng-txt">
                                            <h4><a href="https://www.youtube.com/watch?v=<?= $item->link ?>"
                                                    target="_blank">{{ $item->title }}</a>
                                            </h4>
                                            <ul class="post-meta">
                                                <li><i class="fe-calendar"></i>
                                                    {{ date('d M, Y', strtotime($item->date)) }}</li>
                                            </ul>
                                            {!! Str::limit($item->content, 100) !!}
                                            <br><br>
                                            <a href="https://www.youtube.com/watch?v=<?= $item->link ?>" class="rm"
                                                target="_blank">{{ __('Watch Video') }}</a>
                                        </div>
                                    </div>
                                </div>
                                <!--Box End-->
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="gt-pagination">
                                <nav aria-label="Page navigation example">
                                    {{ $videos->appends(['league' => request()->league, 'name' => request()->name])->links('front.pagination') }}
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
