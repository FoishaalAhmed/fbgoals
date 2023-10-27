@extends('layouts.app')

@section('title', "$title")
@section('content')
    <style>
        .accordion {
            margin: 40px 0;
        }

        .accordion .item {
            border: none;
            margin-bottom: 50px;
            background: none;
        }

        .t-p {
            color: rgb(193 206 216);
            padding: 40px 30px 0px 30px;
        }

        .accordion .item .item-header h2 button.btn.btn-link {
            background: #171e36;
            color: white;
            border-radius: 0px;
            font-family: 'Poppins';
            font-size: 16px;
            font-weight: 400;
            line-height: 2.5;
            text-decoration: none;
        }

        .accordion .item .item-header {
            border-bottom: none;
            background: transparent;
            padding: 0px;
            margin: 2px;
        }

        .accordion .item .item-header h2 button {
            color: white;
            font-size: 20px;
            padding: 15px;
            display: block;
            width: 100%;
            text-align: left;
        }

        .accordion .item .item-header h2 i {
            float: right;
            font-size: 30px;
            color: #eca300;
            background-color: #171e36;
            width: 60px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 5px;
        }

        button.btn.btn-link.collapsed i {
            transform: rotate(0deg);
        }

        button.btn.btn-link i {
            transform: rotate(180deg);
            transition: 0.5s;
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
                            @include('front.leagues.secondMenu')
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
                                                            <img src="{{ $player->player->photo }}" alt=""
                                                                class="rounded-circle" style="width: 50px">
                                                            {{ $player->player->name }}
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                    </h2>
                                                </div>
                                                <div id="collapseOne<?= $key ?>"
                                                    class="collapse {{ $key == 0 ? 'show' : '' }}"
                                                    aria-labelledby="headingOne<?= $key ?>" data-parent="#accordionExample">

                                                    @foreach ($player->statistics as $statistic)
                                                        <div class="group-box">
                                                            <h6><img src="{{ $statistic->league->logo }}"
                                                                    alt=""class="rounded"
                                                                    style="width: 50px;height: 50px;margin-top: 10px;">
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
                                                                        <h4 style="background: #3fca7c">{{ __('Games') }}
                                                                        </h4>
                                                                        <table>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td><strong>{{ __('Appearences') }}</strong>
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
                                                                        <h4 style="background: #e81f3e">{{ __('Goals') }}
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
                                                                        <h4 style="background: #171e36">{{ __('Passes') }}
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
                                                                        <h4 style="background: #8db13d">{{ __('Tackles') }}
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
                                                                        <h4 style="background: #1234a8">{{ __('Duels') }}
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
                                                                        <h4 style="background: #78ca3f">
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
                                                                        <h4 style="background: #127ea8">{{ __('Fouls') }}
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
                                                                        <h4 style="background: #3fca7c">{{ __('Cards') }}
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
                                                                        <h4 style="background: #12a893">{{ __('Penalty') }}
                                                                        </h4>
                                                                        <table>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td><strong>{{ __('Won') }}</strong>
                                                                                    </td>
                                                                                    <td><strong>{{ __('Commited') }}</strong>
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
                                                <img src="https://img.youtube.com/vi/<?= $item->link ?>/1.jpg"
                                                    alt="">
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
            </div>
            <!--End-->
        </div>
        <!--team Page End-->
    </div>
    <!--Main Content End-->
@endsection
