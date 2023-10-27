<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description"
        content="Watch live football matches, live football score, leagues details , team details and also football live tv channel and more">
    <meta name="keywords"
        content="football, soccer, football live, soccer live, football live score, live football matches, football live tv ,  live soccer , soccer live matches, World Cup, Premier League, Serie A, UEFA Champions League, UEFA europa league, Africa Cup of Nations,Copa America, Friendlies, AFC Champions League, La Liga, Coppa Italia, UEFA Super Cup, Bundesliga, UEFA Europa Conference League, Championship, League One, FA Cup, EFL Trophy, Ligue 1, Eredivisie, Cup, USL Championship, Major League Soccer, NPFL, Premier League, King's Cup, Super Cup, CONCACAF Nations League, QSL Cup, world cup, premier league, serie a, uefa champions league, uefa europa league, africa cup of nations, copa america, friendlies, afc champions league, la liga, coppa italia, ufea super cup, bundesliga, uefa europa conference league, championship, league one, fa cup, efl trophy, ligue 1, eredivisie, cup, usl championship, major league soccer, npfl, premier league, king's cup, super cup, concacaf nations league, qsl cup, Chelsea, Manchester United, Barcelona, Real Madrid, Liverpool, Arsenal, Manchester City, Tottenham, Crystal Palace, Paris Saint Germain, Juventus, Napoli, AC Milan, Inter, chelsea, manchester united, barcelona, real madrid, liverpool, arsenal, manchester city, tottenham, crystal palace, paris saint germain, juventus, napoli, ac milan, inter, Football Teams, Scores, Stats, News, Fixtures, Results, Tables">
    <meta name="author" content="fbgoals.com">
    <link rel="icon" href="{{ asset('public/assets/front/images/fav.png') }}" type="image/png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('public/assets/front/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/front/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/front/css/color.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/front/css/bootstrap.min.css') }}">
    <link href="{{ asset('public/assets/backend/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('public/assets/front/css/prettyPhoto.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/front/css/style.css') }}">

    <!--Rev Slider End-->
    <title>@yield('title')</title>

    @section('css')
        
    @show
</head>

<body>
    <!--Wrapper Start-->
    <div class="wrapper">
        <!--Header Start-->
        <header id="main-header" class="main-header">
            <!--topbar-->
            <div class="topbar">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <ul class="topsocial">
                                <li><a href="{{ $contact->facebook }}" class="fb"><i
                                            class="fe-facebook"></i></a></li>
                                <li><a href="{{ $contact->twitter }}" class="tw"><i class="fe-twitter"></i></a>
                                </li>
                                <li><a href="{{ $contact->instagram }}" class="insta"><i
                                            class="fe-instagram"></i></a></li>
                                <li><a href="{{ $contact->youtube }}" class="yt"><i class="fe-youtube"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <ul class="toplinks">
                                <li class="lang-btn">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"> {{ __('ENG') }} </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"> 
                                            <a class="dropdown-item" href="#">{{ __('ENG') }}</a> 
                                            <a class="dropdown-item" href="#">{{ __('FR') }}</a> 
                                            <a class="dropdown-item" href="#">{{ __('GR') }}</a>
                                            <a class="dropdown-item" href="#">{{ __('AR') }}</a> 
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--topbar end-->
            <!--Logo + Navbar Start-->
            <div class="logo-navbar">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 col-sm-5">
                            <div class="logo">
                                <a href="{{ url('/') }}"><img src="{{ asset(lightLogo()) }}" alt="" class="logo-img"></a>
                            </div>
                        </div>
                        <div class="col-md-10 col-sm-7">
                            <nav class="main-nav">
                                <ul>
                                    <li class="nav-item"> <a href="{{ url('/') }}">{{ __('Home') }}</a></li>

                                    <li class="nav-item drop-down">
                                        <a href="">{{ __('Live') }}</a>
                                        <ul>
                                            <li class="nav-item"> <a
                                                    href="{{ route('live.scores') }}">{{ __('Live Score') }}</a>
                                            </li>
                                            <li class="nav-item"> <a
                                                    href="{{ route('live.matches') }}">{{ __('Live Matches') }}</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="nav-item"> <a href="{{ route('fixtures') }}">{{ __('Fixtures') }}</a>
                                    </li>

                                    <li class="nav-item"> <a href="{{ route('leagues') }}">{{ __('Leagues') }}</a>
                                    </li>

                                    <li class="nav-item"> <a href="{{ route('teams') }}">{{ __('Teams') }}</a></li>

                                    <li class="nav-item drop-down">
                                        <a href="">{{ __('News & Videos') }}</a>
                                        <ul>
                                            <li class="nav-item"> <a
                                                    href="{{ route('news') }}">{{ __('News') }}</a>
                                            </li>
                                            <li class="nav-item"> <a
                                                    href="{{ route('videos') }}">{{ __('Videos') }}</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item drop-down">
                                        <a href="">{{ __('About Us') }}</a>
                                        <ul>
                                            <li class="nav-item"> <a
                                                    href="{{ route('contact') }}">{{ __('Contact Us') }}</a>
                                            </li>
                                            <li class="nav-item"> <a
                                                    href="{{ route('terms') }}">{{ __('Terms & Conditions') }}</a>
                                            </li>
                                            <li class="nav-item"> <a
                                                    href="{{ route('privacy') }}">{{ __('Privacy Policy') }}</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!--Logo + Navbar End-->
        </header>
        <!--Header End-->

        @yield('content')

        <!--Main Footer Start-->
        <footer class="wf100 main-footer">
            
            <div class="container brtop">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <p class="copyr"> {{ __('All Rights Reserved of Sports') }} © {{ date('Y') }} </p>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <ul class="quick-links">
                            <li><a href="{{ url('/') }}">{{ __('Home') }}</a></li>

                            <li><a href="{{ route('leagues') }}">{{ __('Leagues') }}</a>
                            </li>

                            <li><a href="{{ route('fixtures') }}">{{ __('Fixtures') }}</a>
                            </li>

                            <li><a href="{{ route('teams') }}">{{ __('Teams') }}</a></li>

                            <li><a href="{{ route('news') }}">{{ __('News') }}</a></li>

                            <li><a href="{{ route('videos') }}">{{ __('Videos') }}</a></li>

                            <li><a href="{{ route('contact') }}">{{ __('Contact') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!--Main Footer End-->
    </div>
    <!--Wrapper End-->



    <!-- Optional JavaScript -->
    <script src="{{ asset('public/assets/front/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('public/assets/front/js/jquery-migrate-3.0.1.js') }}"></script>
    <script src="{{ asset('public/assets/front/js/popper.min.js') }}"></script>
    <script src="{{ asset('public/assets/front/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/assets/front/js/mobile-nav.js') }}"></script>
    <script src="{{ asset('public/assets/front/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('public/assets/front/js/isotope.js') }}"></script>
    <script src="{{ asset('public/assets/front/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('public/assets/front/js/jquery.countdown.js') }}"></script>
    <script src="{{ asset('public/assets/front/js/custom.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            var clientTimezoneOffset = new Date().getTimezoneOffset() / 60; //offset in hours
            var timeZone = Intl.DateTimeFormat().resolvedOptions().timeZone;

            if (typeof timeZone === 'undefined' || timeZone === null) {
                timeZone = "UTC";
            }


            document.cookie = "client_timezone=" + timeZone;

        });
    </script>
    @section('js')

    @show
</body>

</html>
