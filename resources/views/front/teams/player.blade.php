@extends('layouts.app')

@section('title', "$title")

@section('css')
    <link rel="stylesheet" href="{{ asset('public/assets/front/css/teamplayer.min.css') }}">
@endsection

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
                            <div class="col-md-12 mb-10"> 
                                <center>
                                    {!! $ads->where('position', 'top')->first()->ad !!}
                                </center>
                            </div>
                        @endif
                        <!--Fixture Start-->
                        <div class="col-lg-8">
                            @include('front.teams.secondMenu')
                            <div class="container">
                                <div class="accordion" id="accordionExample">
                                    @if ($players)
                                        @foreach ($players as $key => $player)
                                            <div class="item">
                                                <div class="item-header" id="<?= $key ?>">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                                            data-target="#collapseOne<?= $key ?>" aria-expanded="true"
                                                            aria-controls="collapseOne<?= $key ?>">
                                                            <img src="{{ $player->player->photo }}" 
                                                                class="rounded-circle width-50">
                                                            {{ $player->player->name }}
                                                            <i class="fe-chevron-down"></i>
                                                        </button>
                                                    </h2>
                                                </div>
                                                <div id="collapseOne<?= $key ?>"
                                                    class="collapse {{ $key == 0 ? 'show' : '' }}"
                                                    aria-labelledby="headingOne<?= $key ?>" data-parent="#accordionExample">

                                                    @foreach ($player->statistics as $statistic)
                                                        <div class="group-box">
                                                            <h6><img src="{{ $statistic->league->logo }}" 
                                                                    class="rounded-circle w-50-h-50-mt-10"
                                                                    >
                                                                {{ $statistic->league->name }} </h6>
                                                            <ul>
                                                                <li>{{ __('Country') }} : {{ $statistic->league->country }}
                                                                </li>
                                                                <li>{{ __('Season') }} : {{ $statistic->league->season }}
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="match-players">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="team-palyers">
                                                                        <h4 class="background-3fca7c">{{ __('Games') }}
                                                                        </h4>
                                                                        <table>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td><strong>{{ __('Appearances') }}</strong>
                                                                                    </td>
                                                                                    <td><strong>{{ __('Lineups') }}</strong>
                                                                                    </td>
                                                                                    <td><strong>{{ __('Minutes') }}</strong>
                                                                                    </td>
                                                                                    <td><strong>{{ __('Number') }}</strong>
                                                                                    </td>
                                                                                    <td><strong>{{ __('Position') }}</strong>
                                                                                    </td>
                                                                                    <td><strong>{{ __('Rating') }}</strong>
                                                                                    </td>
                                                                                    <td><strong>{{ __('Captain') }}</strong>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>{{ $statistic->games->appearences }}
                                                                                    </td>
                                                                                    <td>{{ $statistic->games->lineups }}
                                                                                    </td>
                                                                                    <td>{{ $statistic->games->minutes }}
                                                                                    </td>
                                                                                    <td>{{ $statistic->games->number }}
                                                                                    </td>
                                                                                    <td>{{ $statistic->games->position }}
                                                                                    </td>
                                                                                    <td>{{ $statistic->games->rating }}
                                                                                    </td>
                                                                                    <td>{{ $statistic->games->captain }}
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="match-players">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="team-palyers">
                                                                        <h4>{{ __('Substitutes') }}</h4>
                                                                        <table>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td><strong>{{ __('In') }}</strong>
                                                                                    </td>
                                                                                    <td><strong>{{ __('Out') }}</strong>
                                                                                    </td>
                                                                                    <td><strong>{{ __('Bench') }}</strong>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>{{ $statistic->substitutes->in }}
                                                                                    </td>
                                                                                    <td>{{ $statistic->substitutes->out }}
                                                                                    </td>
                                                                                    <td>{{ $statistic->substitutes->bench }}
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="team-palyers c2">
                                                                        <h4>{{ __('Shots') }}</h4>
                                                                        <table>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td><strong>{{ __('Total') }}</strong>
                                                                                    </td>
                                                                                    <td><strong>{{ __('On') }}</strong>
                                                                                    </td>

                                                                                </tr>
                                                                                <tr>
                                                                                    <td>{{ $statistic->shots->total }}</td>
                                                                                    <td>{{ $statistic->shots->on }}</td>

                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="match-players">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="team-palyers">
                                                                        <h4 class="background-e81f3e">{{ __('Goals') }}
                                                                        </h4>
                                                                        <table>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td><strong>{{ __('Total') }}</strong>
                                                                                    </td>
                                                                                    <td><strong>{{ __('Conceded') }}</strong>
                                                                                    </td>
                                                                                    <td><strong>{{ __('Assists') }}</strong>
                                                                                    </td>
                                                                                    <td><strong>{{ __('Saves') }}</strong>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>{{ $statistic->goals->total }}</td>
                                                                                    <td>{{ $statistic->goals->conceded }}
                                                                                    </td>
                                                                                    <td>{{ $statistic->goals->assists }}
                                                                                    </td>
                                                                                    <td>{{ $statistic->goals->saves }}</td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="team-palyers c2">
                                                                        <h4 class="background-171e36">{{ __('Passes') }}
                                                                        </h4>
                                                                        <table>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td><strong>{{ __('Total') }}</strong>
                                                                                    </td>
                                                                                    <td><strong>{{ __('Key') }}</strong>
                                                                                    </td>
                                                                                    <td><strong>{{ __('Accuracy') }}</strong>
                                                                                    </td>

                                                                                </tr>
                                                                                <tr>
                                                                                    <td>{{ $statistic->passes->total }}
                                                                                    </td>
                                                                                    <td>{{ $statistic->passes->key }}</td>
                                                                                    <td>{{ $statistic->passes->accuracy }}
                                                                                    </td>

                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="match-players">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="team-palyers">
                                                                        <h4 class="background-8db13d">{{ __('Tackles') }}
                                                                        </h4>
                                                                        <table>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td><strong>{{ __('Total') }}</strong>
                                                                                    </td>
                                                                                    <td><strong>{{ __('Blocks') }}</strong>
                                                                                    </td>
                                                                                    <td><strong>{{ __('Interceptions') }}</strong>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>{{ $statistic->tackles->total }}
                                                                                    </td>
                                                                                    <td>{{ $statistic->tackles->blocks }}
                                                                                    </td>
                                                                                    <td>{{ $statistic->tackles->interceptions }}
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="team-palyers c2">
                                                                        <h4 class="background-1234a8">{{ __('Duels') }}
                                                                        </h4>
                                                                        <table>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td><strong>{{ __('Total') }}</strong>
                                                                                    </td>
                                                                                    <td><strong>{{ __('won') }}</strong>
                                                                                    </td>

                                                                                </tr>
                                                                                <tr>
                                                                                    <td>{{ $statistic->duels->total }}</td>
                                                                                    <td>{{ $statistic->duels->won }}</td>

                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="match-players">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="team-palyers">
                                                                        <h4 class="background-78ca3f">
                                                                            {{ __('Dribbles') }}
                                                                        </h4>
                                                                        <table>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td><strong>{{ __('Attempts') }}</strong>
                                                                                    </td>
                                                                                    <td><strong>{{ __('Success') }}</strong>
                                                                                    </td>
                                                                                    <td><strong>{{ __('Past') }}</strong>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>{{ $statistic->dribbles->attempts }}
                                                                                    </td>
                                                                                    <td>{{ $statistic->dribbles->success }}
                                                                                    </td>
                                                                                    <td>{{ $statistic->dribbles->past }}
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="team-palyers c2">
                                                                        <h4 class="background-127ea8">{{ __('Fouls') }}
                                                                        </h4>
                                                                        <table>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td><strong>{{ __('Drawn') }}</strong>
                                                                                    </td>
                                                                                    <td><strong>{{ __('Committed') }}</strong>
                                                                                    </td>

                                                                                </tr>
                                                                                <tr>
                                                                                    <td>{{ $statistic->fouls->drawn }}</td>
                                                                                    <td>{{ $statistic->fouls->committed }}
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="match-players">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="team-palyers">
                                                                        <h4 class="background-3fca7c">{{ __('Cards') }}
                                                                        </h4>
                                                                        <table>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td><strong>{{ __('Yellow') }}</strong>
                                                                                    </td>
                                                                                    <td><strong>{{ __('Yellowred') }}</strong>
                                                                                    </td>
                                                                                    <td><strong>{{ __('Red') }}</strong>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>{{ $statistic->cards->yellow }}
                                                                                    </td>
                                                                                    <td>{{ $statistic->cards->yellowred }}
                                                                                    </td>
                                                                                    <td>{{ $statistic->cards->red }}</td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="team-palyers c2">
                                                                        <h4 class="background-12a893">{{ __('Penalty') }}
                                                                        </h4>
                                                                        <table>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td><strong>{{ __('Won') }}</strong>
                                                                                    </td>
                                                                                    <td><strong>{{ __('Committed') }}</strong>
                                                                                    </td>
                                                                                    <td><strong>{{ __('Scored') }}</strong>
                                                                                    </td>
                                                                                    <td><strong>{{ __('Missed') }}</strong>
                                                                                    </td>
                                                                                    <td><strong>{{ __('Saved') }}</strong>
                                                                                    </td>

                                                                                </tr>
                                                                                <tr>
                                                                                    <td>{{ $statistic->penalty->won }}</td>
                                                                                    <td>{{ $statistic->penalty->commited }}
                                                                                    </td>
                                                                                    <td>{{ $statistic->penalty->scored }}
                                                                                    </td>
                                                                                    <td>{{ $statistic->penalty->missed }}
                                                                                    </td>
                                                                                    <td>{{ $statistic->penalty->saved }}
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
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
                        </div>
                        <!--Fixture End-->
                        <!--Sidebar Start-->
                        <div class="col-lg-4">
                            <div class="sidebar mb-10">
                                <!--widget start-->
                                @include('front.upcomingMatch')
                                <!--widget end-->
                            </div>
                            @if ($ads->where('position', 'sidebar 1')->first())
                                <div class="widget">
                                    {!! $ads->where('position', 'sidebar 1')->first()->ad !!}
                                </div>
                            @endif
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
                                                    ></div>
                                        </div>
                                        <!--Expand-->
                                    @endforeach

                                </div>
                            @endif
                            @if ($ads->where('position', 'sidebar 2')->first())
                                <div class="widget">
                                    {!! $ads->where('position', 'sidebar 2')->first()->ad !!}
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
                                                        >
                                                </div>
                                            @endforeach
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
