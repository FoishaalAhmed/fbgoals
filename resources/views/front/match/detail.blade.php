@extends('layouts.app')

@section('title', "$title")
@section('content')

    <style>
        .nav-active {
            background: #171e36;
            color: aliceblue;
            margin: 5px;
            border: 1px solid aliceblue;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .live-link {
            background: #374b8f;
            color: aliceblue;
            margin-right: 5px;
            border: 1px solid aliceblue;
            border-radius: 10px;
            text-align: center;
        }

        .link-section {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        /* .active {
                                                                        background: #7c79d0;
                                                                    } */

        .progress {
            height: .5rem;
        }


        :root {
            --white: #ffffff;
            --black: #000000;
            --blue: #0288d1;
            --gray: #ebebeb;
            --box-shadow1: 0px 0px 18px 2px rgba(10, 55, 90, 0.15);
        }

        :focus {
            outline: 0px solid transparent !important;
        }

        .timeline {
            padding: 50px 0;
            position: relative;
        }

        .timeline-nodes {
            padding-bottom: 25px;
            position: relative;
        }

        .timeline-nodes:nth-child(even) {
            flex-direction: row-reverse;
        }

        .timeline h3,
        .timeline p {
            padding: 5px 15px;
        }

        .timeline h3 {
            font-weight: lighter;
            background: var(--blue);
        }

        .timeline p,
        .timeline time {
            color: var(--blue)
        }

        .timeline::before {
            content: "";
            display: block;
            position: absolute;
            top: 0;
            left: 50%;
            width: 0;
            border-left: 2px dashed var(--blue);
            height: 100%;
            z-index: 1;
            transform: translateX(-50%);
        }

        .timeline-content {
            border: 1px solid var(--blue);
            position: relative;
            border-radius: 0 0 10px 10px;
            box-shadow: 0px 3px 25px 0px rgba(10, 55, 90, 0.2)
        }

        .timeline-nodes:nth-child(odd) h3,
        .timeline-nodes:nth-child(odd) p {
            text-align: right;
        }

        .timeline-nodes:nth-child(odd) .timeline-date {
            text-align: left;
        }

        .timeline-nodes:nth-child(even) .timeline-date {
            text-align: right;
        }

        .timeline-nodes:nth-child(odd) .timeline-content::after {
            content: "";
            position: absolute;
            top: 5%;
            left: 100%;
            width: 0;
            border-left: 10px solid var(--blue);
            border-top: 10px solid transparent;
            border-bottom: 10px solid transparent;
        }

        .timeline-nodes:nth-child(even) .timeline-content::after {
            content: "";
            position: absolute;
            top: 5%;
            right: 100%;
            width: 0;
            border-right: 10px solid var(--blue);
            border-top: 10px solid transparent;
            border-bottom: 10px solid transparent;
        }

        .timeline-image {
            position: relative;
            z-index: 100;
        }

        .timeline-image::before {
            content: "";
            width: 60px;
            height: 60px;
            border: 2px dashed var(--blue);
            border-radius: 50%;
            display: block;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            z-index: 1;


        }

        .timeline-image img {
            position: relative;
            z-index: 100;
        }

        /*small device style*/

        @media (max-width: 767px) {

            .timeline-nodes:nth-child(odd) h3,
            .timeline-nodes:nth-child(odd) p {
                text-align: left
            }

            .timeline-nodes:nth-child(even) {
                flex-direction: row;
            }

            .timeline::before {
                content: "";
                display: block;
                position: absolute;
                top: 0;
                left: 4%;
                width: 0;
                border-left: 2px dashed var(--blue);
                height: 100%;
                z-index: 1;
                transform: translateX(-50%);
            }

            .timeline h3 {
                font-size: 1.7rem;
            }

            .timeline p {
                font-size: 14px;
            }

            .timeline-image {
                position: absolute;
                left: 0%;
                top: 60px;
                /*transform: translateX(-50%;);*/
            }

            .timeline-nodes:nth-child(odd) .timeline-content::after {
                content: "";
                position: absolute;
                top: 5%;
                left: auto;
                right: 100%;
                width: 0;
                border-left: 0;
                border-right: 10px solid var(--blue);
                border-top: 10px solid transparent;
                border-bottom: 10px solid transparent;
            }

            .timeline-nodes:nth-child(even) .timeline-content::after {
                content: "";
                position: absolute;
                top: 5%;
                right: 100%;
                width: 0;
                border-right: 10px solid var(--blue);
                border-top: 10px solid transparent;
                border-bottom: 10px solid transparent;
            }

            .timeline-nodes:nth-child(even) .timeline-date {
                text-align: left;
            }

            .timeline-image::before {
                width: 65px;
                height: 65px;
            }
        }

        /*extra small device style */
        @media (max-width: 575px) {
            .timeline::before {
                content: "";
                display: block;
                position: absolute;
                top: 0;
                left: 3%;
            }

            .timeline-image {
                position: absolute;
                left: -5%;
            }

            .timeline-image::before {
                width: 60px;
                height: 60px;
            }
        }

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
    @php
        $statusArray = ['1H', 'HT', '2H', 'ET', 'BT', 'P', 'INT', 'LIVE'];
    @endphp
    <div class="main-content wf100">
        <!--Sports Widgets Start-->
        <section class="wf100 p80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-12">
                        <div class="row">
                            <div class="col-12">
                                <!--Next Match Widget Start-->
                                <!--Box Start-->
                                <div class="group-result">
                                    <div class="nms-title">
                                        <h4>{{ __('Match Detail') }}</h4>
                                    </div>
                                    <div class="last-match-result-full-light">
                                        <div class="row">
                                            <div class="col-4 no-padding">
                                                <div class="match-left">
                                                    <div class="mtl-left"> <img src="{{ $match[0]->teams->home->logo }}"
                                                            alt="">
                                                        <strong>{{ $match[0]->teams->home->name }}</strong>
                                                    </div>
                                                    <div class="mscore"> <strong>{{ $match[0]->goals->home }}</strong></div>

                                                </div>
                                            </div>
                                            <div class="col-4 no-padding">
                                                <div class="lmr-info">
                                                    <strong>{{ $match[0]->league->name . ', ' . $match[0]->league->country }}</strong>


                                                    @if (in_array($match[0]->fixture->status->short, $statusArray))
                                                        <strong
                                                            style="color: #6ed950 !important;font-size: 20px !important;">{{ $match[0]->fixture->status->elapsed . '"' }}</strong>
                                                    @else
                                                        <strong
                                                            style="color: #007399 !important;font-size: 20px !important;">{{ $match[0]->fixture->status->long }}</strong>
                                                    @endif

                                                </div>
                                            </div>
                                            <div class="col-4 no-padding">
                                                <div class="match-right">
                                                    <div class="mscore"> <strong>{{ $match[0]->goals->away }}</strong></div>
                                                    <div class="mtl-right"> <img src="{{ $match[0]->teams->away->logo }}"
                                                            alt="">
                                                        <strong>{{ $match[0]->teams->away->name }}</strong>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-3 no-padding"></div>
                                            <div class="col-md-6 no-padding">
                                                @php
                                                    $finishDiff = (time() - strtotime($match[0]->fixture->date)) / 60;
                                                    $timeDiff = (strtotime($match[0]->fixture->date) - time())/60;
                                                @endphp
                                                @if (isset($links))
                                                    <div class="row">
                                                        @foreach ($links as $link)
                                                            <div class="col-lg-3 col-md-3 col-12 no-padding">
                                                                @if ((in_array($match[0]->fixture->status->short, $statusArray) || $timeDiff < 30) && ($finishDiff < 120))
                                                                    <a class="nav-item nav-link live-link no-padding"
                                                                        href="javascript:;"
                                                                        onclick="window.open('<?= $link->link ?>', 'name','width=800,height=650')">{{ __('Stream') }}
                                                                        {{ $loop->index + 1 }}</a>
                                                                @else
                                                                    <a class="nav-item nav-link live-link no-padding"
                                                                        href="javascript:;" data-toggle="modal"
                                                                        data-target="#myModal">{{ __('Stream') }}
                                                                        {{ $loop->index + 1 }}</a>
                                                                @endif

                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-3 no-padding"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        <div class="row">
                            <div class="col-12">
                                <nav>
                                    <div class="nav" id="nav-tab" role="tablist">

                                        <a class="nav-item nav-link nav-active active" id="nav-1-tab" data-toggle="tab"
                                            href="#nav-defenders" role="tab" aria-controls="nav-defenders"
                                            aria-selected="true">{{ __('Match Detail') }}</a>

                                        <a class="nav-item nav-link nav-active" id="nav-2-tab" data-toggle="tab"
                                            href="#nav-gk" role="tab" aria-controls="nav-gk"
                                            aria-selected="false">{{ __('Line Up') }}</a>

                                        <a class="nav-item nav-link nav-active " id="nav-3-tab" data-toggle="tab"
                                            href="#nav-forwarders" role="tab" aria-controls="nav-forwarders"
                                            aria-selected="false">{{ __('Head To Head') }}</a>

                                        <a class="nav-item nav-link nav-active " id="nav-6-tab" data-toggle="tab"
                                            href="#nav-statistics" role="tab" aria-controls="nav-statistics"
                                            aria-selected="false">{{ __('Statistics') }}</a>

                                        <a class="nav-item nav-link nav-active " id="nav-7-tab" data-toggle="tab"
                                            href="#nav-team" role="tab" aria-controls="nav-team"
                                            aria-selected="false">{{ __('Team') }}</a>

                                    </div>
                                </nav>
                            </div>
                        </div>
                        @php
                            if ($match[0]->lineups) {
                                if ($match[0]->teams->home->name == $match[0]->lineups[0]->team->name) {
                                    $homeFormation = $match[0]->lineups[0]->formation;
                                    $homeStartXI = $match[0]->lineups[0]->startXI;
                                    $homeSubstitutes = $match[0]->lineups[0]->substitutes;
                                    $homeCoach = $match[0]->lineups[0]->coach;
                                    $awayFormation = $match[0]->lineups[1]->formation;
                                    $awayStartXI = $match[0]->lineups[1]->startXI;
                                    $awaySubstitutes = $match[0]->lineups[1]->substitutes;
                                    $awayCoach = $match[0]->lineups[1]->coach;
                                } else {
                                    $homeFormation = $match[0]->lineups[1]->formation;
                                    $homeStartXI = $match[0]->lineups[1]->startXI;
                                    $homeSubstitutes = $match[0]->lineups[1]->substitutes;
                                    $homeCoach = $match[0]->lineups[1]->coach;
                                    $awayFormation = $match[0]->lineups[0]->formation;
                                    $awayStartXI = $match[0]->lineups[0]->startXI;
                                    $awaySubstitutes = $match[0]->lineups[0]->substitutes;
                                    $awayCoach = $match[0]->lineups[0]->coach;
                                }
                            }
                            
                            $images = [
                                'Card' => [
                                    'Red Card' => 'public/front/images/red-card.png',
                                    'Yellow Card' => 'public/front/images/yellow-card.png',
                                ],
                                'Goal' => 'public/front/images/slide1-football.png',
                                'subst' => 'public/front/images/substitution.png',
                                'Var' => 'public/front/images/var.png',
                            ];
                        @endphp
                        <div class="col-12">
                            <div class="tab-content wf100" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-defenders" role="tabpanel"
                                    aria-labelledby="nav-1-tab">
                                     @if ($match[0]->events)
                                    <div class="container">
                                        <div class="timeline">
                                           
                                                @foreach ($match[0]->events as $event)
                                                    @php
                                                        switch ($event->type) {
                                                            case 'Card':
                                                                $image = $images[$event->type][$event->detail];
                                                                break;
                                                        
                                                            default:
                                                                $image = $images[$event->type];
                                                                break;
                                                        }
                                                        
                                                        switch ($event->type) {
                                                            case 'subst':
                                                                $player = $event->player->name . ' <-> ' . $event->assist->name;
                                                                break;
                                                        
                                                            default:
                                                                $player = $event->player->name;
                                                                break;
                                                        }
                                                    @endphp
                                                    <div
                                                        class="row no-gutters justify-content-end justify-content-md-around align-items-start  timeline-nodes">
                                                        <div class="col-10 col-md-5 order-3 order-md-1 timeline-content">
                                                            <h3 class="text-light">{!! $player !!}
                                                                {{ $event->type }} <img src="{{ asset($image) }}"
                                                                    alt="" style="width: 30px;"></h3>
                                                        </div>
                                                        <div
                                                            class="col-2 col-sm-1 px-md-3 order-2 timeline-image text-md-center">
                                                            <img src="" class="img-fluid"
                                                                alt='{{ $event->time->elapsed }}"'>
                                                        </div>
                                                        <div class="col-10 col-md-5 order-1 order-md-3 py-3 timeline-date">
                                                            <time></time>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="tab-pane fade" id="nav-gk" role="tabpanel" aria-labelledby="nav-2-tab">
                                    @if ($match[0]->lineups)
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="link-section">
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                            <strong
                                                                style="color: aliceblue">{{ $match[0]->teams->home->name }}
                                                                <br />
                                                                {{ __('Formation') }} : {{ $homeFormation }} </strong>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <img src="{{ $match[0]->teams->home->logo }}" alt=""
                                                                class="float-end" style="width: 50px;float: right;">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="point-table-widget" style="border-bottom: none;">
                                                    <table>
                                                        <thead style="background: #343e60;">
                                                            <tr>
                                                                <th colspan="2">{{ __('Coach') }}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td></td>
                                                                <td>
                                                                    {{ $homeCoach->name }}
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="point-table-widget"
                                                    style="border-top: none; border-bottom: none">
                                                    <table>
                                                        <thead style="background: #343e60;">
                                                            <tr>
                                                                <th colspan="2">{{ __('Starting XI') }}</th>
                                                                <th>{{ __('Jersey') }}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if ($match[0]->lineups)
                                                                @foreach ($homeStartXI as $key => $player)
                                                                    <tr>
                                                                        <td><img src="{{ asset('public/images/player.jpg') }}" alt="" style="width: 50px;" class="rounded"></td>
                                                                        <td><strong>{{ $player->player->name }}</strong>
                                                                        </td>
                                                                        <td><strong>{{ $player->player->number }}</strong>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="point-table-widget" style="border-top: none;">
                                                    <table>
                                                        <thead style="background: #343e60;">
                                                            <tr>
                                                                <th colspan="2">{{ __('Substitutes') }}</th>
                                                                <th>{{ __('Jersey') }}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if ($match[0]->lineups)
                                                                @foreach ($homeSubstitutes as $key => $player)
                                                                    <tr>
                                                                        <td><img src="{{ asset('public/images/player.jpg') }}" alt="" style="width: 50px;" class="rounded"></td>
                                                                        
                                                                        <td><strong>{{ $player->player->name }}</strong>
                                                                        </td>
                                                                        <td><strong>{{ $player->player->number }}</strong>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="link-section">
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                            <strong
                                                                style="color: aliceblue">{{ $match[0]->teams->away->name }}
                                                                <br />
                                                                {{ __('Formation') }} : {{ $awayFormation }} </strong>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <img src="{{ $match[0]->teams->away->logo }}" alt=""
                                                                class="float-end" style="width: 50px;float: right;">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="point-table-widget" style="border-bottom: none;">
                                                    <table>
                                                        <thead style="background: #343e60;">
                                                            <tr>
                                                                <th colspan="2">{{ __('Coach') }}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td></td>
                                                                <td>
                                                                    {{ $awayCoach->name }}
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="point-table-widget"
                                                    style="border-top: none; border-bottom: none">
                                                    <table>
                                                        <thead style="background: #343e60;">
                                                            <tr>
                                                                <th colspan="2">{{ __('Starting XI') }}</th>
                                                                <th>{{ __('Jersey') }}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if ($match[0]->lineups)
                                                                @foreach ($awayStartXI as $key => $player)
                                                                    <tr>
                                                                        <td><img src="{{ asset('public/images/player.jpg') }}" alt="" style="width: 50px;" class="rounded"></td>
                                                                        
                                                                        <td><strong>{{ $player->player->name }}</strong>
                                                                        </td>
                                                                        <td><strong>{{ $player->player->number }}</strong>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="point-table-widget" style="border-top: none;">
                                                    <table>
                                                        <thead style="background: #343e60;">
                                                            <tr>
                                                                <th colspan="2">{{ __('Substitutes') }}</th>
                                                                <th>{{ __('Jersey') }}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if ($match[0]->lineups)
                                                                @foreach ($awaySubstitutes as $key => $player)
                                                                    <tr>
                                                                        <td><img src="{{ asset('public/images/player.jpg') }}" alt="" style="width: 50px;" class="rounded"></td>
                                                                        
                                                                        <td><strong>{{ $player->player->name }}</strong>
                                                                        </td>
                                                                        <td><strong>{{ $player->player->number }}</strong>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="tab-pane fade" id="nav-forwarders" role="tabpanel"
                                    aria-labelledby="nav-3-tab">
                                    @if (isset($headToHead))
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="point-table-widget">
                                                    <table>
                                                        <tbody>
                                                            @foreach ($headToHead as $item)
                                                                <tr>
                                                                    <td><img src="{{ $item->teams->home->logo }}"
                                                                            alt=""
                                                                            style="width: 50px;"><strong>{{ $item->teams->home->name }}
                                                                        </strong>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <strong>{{ $item->goals->home . ' - ' . $item->goals->away }}</strong>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <strong>{{ $item->teams->away->name }}
                                                                        </strong><img src="{{ $item->teams->away->logo }}"
                                                                            alt="" style="width: 50px;">
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="tab-pane" id="nav-statistics" role="tabpanel" aria-labelledby="nav-6-tab"
                                    style="background: #0C1837; border-radius: 5px;">
                                    @if ($match[0]->statistics)
                                        @foreach ($match[0]->statistics[0]->statistics as $key => $item)
                                            <div class="row" style="margin-top: 10px;">
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="group-result">
                                                        <div class="last-match-result-full-light"
                                                            style="background: #163268;">
                                                            <div class="row">
                                                                <div class="col-4 no-padding">
                                                                    <p style="margin-left: 10px; color: whitesmoke">
                                                                        <strong>
                                                                            {{ $item->value }} </strong></p>
                                                                </div>
                                                                <div class="col-4 no-padding">
                                                                    <p style="text-align: center; color: whitesmoke">
                                                                        <strong>
                                                                            {{ $item->type }} </strong></p>
                                                                </div>
                                                                <div class="col-4 no-padding">
                                                                    <p
                                                                        style="text-align: right; margin-right: 10px; color: whitesmoke">
                                                                        <strong>
                                                                            {{ $match[0]->statistics[1]->statistics[$key]->value }}
                                                                        </strong>
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="progress">
                                                                        <div class="progress-bar bg-success"
                                                                            style="width:<?= is_numeric($item->value) ? ($item->value * 100) / ($item->value + $match[0]->statistics[1]->statistics[$key]->value) . '%' : $item->value ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="progress">
                                                                        <div class="progress-bar bg-danger"
                                                                            style="width:<?= is_numeric($match[0]->statistics[1]->statistics[$key]->value) ? ($match[0]->statistics[1]->statistics[$key]->value * 100) / ($item->value + $match[0]->statistics[1]->statistics[$key]->value) . '%' : $match[0]->statistics[1]->statistics[$key]->value ?> ">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="tab-pane fade" id="nav-team" role="tabpanel" aria-labelledby="nav-7-tab">
                                    <div class="container">
                                        <div class="accordion" id="accordionExample">
                                            @if ($match[0]->players)
                                                @foreach ($match[0]->players as $players)
                                                    <div class="col-md-6 col-lg-6 col-12">
                                                        <div class="match-results-table">
                                                            <table>
                                                                <tr>
                                                                    <td>{{ __('Team') }}</td>
                                                                    <td>{{ $players->team->name }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>{{ __('Logo') }}</td>
                                                                    <td><img src="{{ $players->team->logo }}"
                                                                            alt="" class="rounded"
                                                                            style="width: 50px; padding: 7px;"></td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>

                                                    @foreach ($players->players as $key => $player)
                                                        <div class="item">
                                                            <div class="item-header" id="<?= $key ?>">
                                                                <h2 class="mb-0">
                                                                    <button class="btn btn-link" type="button"
                                                                        data-toggle="collapse"
                                                                        data-target="#collapseOne<?= $key ?>"
                                                                        aria-expanded="true"
                                                                        aria-controls="collapseOne<?= $key ?>">
                                                                        <img src="{{ $player->player->photo }}"
                                                                            alt="" class="rounded-circle"
                                                                            style="width: 50px">
                                                                        {{ $player->player->name }}
                                                                        <i class="fa fa-angle-down"></i>
                                                                    </button>
                                                                </h2>
                                                            </div>
                                                            <div id="collapseOne<?= $key ?>"
                                                                class="collapse {{ $key == 0 ? 'show' : '' }}"
                                                                aria-labelledby="headingOne<?= $key ?>"
                                                                data-parent="#accordionExample">
                                                                @foreach ($player->statistics as $statistic)
                                                                    <div class="match-players" style="margin-top: 10px;">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="team-palyers table-responsive">
                                                                                    <h4 style="background: #3fca7c">
                                                                                        {{ __('Games') }}
                                                                                    </h4>
                                                                                    <table>
                                                                                        <tbody>
                                                                                            <tr>
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
                                                                            <div class="col-md-6">
                                                                                <div
                                                                                    class="team-palyers table-responsive c2">
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
                                                                                                <td>{{ $statistic->shots->total }}
                                                                                                </td>
                                                                                                <td>{{ $statistic->shots->on }}
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
                                                                                <div class="team-palyers table-responsive">
                                                                                    <h4 style="background: #e81f3e">
                                                                                        {{ __('Goals') }}
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
                                                                                                <td>{{ $statistic->goals->total }}
                                                                                                </td>
                                                                                                <td>{{ $statistic->goals->conceded }}
                                                                                                </td>
                                                                                                <td>{{ $statistic->goals->assists }}
                                                                                                </td>
                                                                                                <td>{{ $statistic->goals->saves }}
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div
                                                                                    class="team-palyers table-responsive c2">
                                                                                    <h4 style="background: #171e36">
                                                                                        {{ __('Passes') }}
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
                                                                                                <td>{{ $statistic->passes->key }}
                                                                                                </td>
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
                                                                                <div class="team-palyers table-responsive">
                                                                                    <h4 style="background: #8db13d">
                                                                                        {{ __('Tackles') }}
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
                                                                                <div
                                                                                    class="team-palyers table-responsive c2">
                                                                                    <h4 style="background: #1234a8">
                                                                                        {{ __('Duels') }}
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
                                                                                                <td>{{ $statistic->duels->total }}
                                                                                                </td>
                                                                                                <td>{{ $statistic->duels->won }}
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
                                                                                <div class="team-palyers table-responsive">
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
                                                                                <div
                                                                                    class="team-palyers table-responsive c2">
                                                                                    <h4 style="background: #127ea8">
                                                                                        {{ __('Fouls') }}
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
                                                                                                <td>{{ $statistic->fouls->drawn }}
                                                                                                </td>
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
                                                                                <div class="team-palyers table-responsive">
                                                                                    <h4 style="background: #3fca7c">
                                                                                        {{ __('Cards') }}
                                                                                    </h4>
                                                                                    <table>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td><strong>{{ __('Yellow') }}</strong>
                                                                                                </td>
                                                                                                <td><strong>{{ __('Red') }}</strong>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>{{ $statistic->cards->yellow }}
                                                                                                </td>
                                                                                                <td>{{ $statistic->cards->red }}
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div
                                                                                    class="team-palyers table-responsive c2">
                                                                                    <h4 style="background: #12a893">
                                                                                        {{ __('Penalty') }}
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
                                                                                                <td>{{ $statistic->penalty->won }}
                                                                                                </td>
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
                                                @endforeach
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
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
                                            <img src="https://img.youtube.com/vi/<?= $item->link ?>/1.jpg" alt="">
                                        </div>
                                    @endforeach
                                    <div class="buyticket-btn"><a
                                            href="{{ route('videos') }}">{{ __('View All') }}</a></div>
                                </div>
                            </div>
                            <!--widget end-->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Sports Widgets End-->
    </div>
    <!--Main Content End-->

    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    @if($finishDiff > 120)
                        <h3 style="text-align: center; color: red">{{ __('Live video is not available as this match has finished! ') }}</h3>
                    @else
                        <h3 style="text-align: center; color: red">{{ __('Live video will be available 30 minutes prior to the match start! ') }}</h3>
                    @endif
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
@endsection
