<!-- ========== Menu ========== -->
<div class="app-menu">

    <!-- Brand Logo -->
    <div class="logo-box">
        <!-- Brand Logo Light -->
        <a href="{{ url('/') }}" class="logo-light">
            <img src="{{ asset(lightLogo()) }}" alt="logo" class="logo-lg">
            <img src="{{ asset(smallLogo()) }}" alt="small logo" class="logo-sm">
        </a>

        <!-- Brand Logo Dark -->
        <a href="{{ url('/') }}" class="logo-dark">
            <img src="{{ asset(darkLogo()) }}" alt="dark logo" class="logo-lg">
            <img src="{{ asset(smallLogo()) }}" alt="small logo" class="logo-sm">
        </a>
    </div>

    <!-- menu-left -->
    <div class="scrollbar">

        <!--- Menu -->
        <ul class="menu">

            <li class="menu-title">{{ __('Navigation') }}</li>

            <li class="menu-item">
                <a href="{{ route('dashboard') }}" class="menu-link">
                    <span class="menu-icon"><i class="mdi mdi-view-dashboard-outline"></i></span>
                    <span class="menu-text"> {{ __('Dashboard') }} </span>
                </a>
            </li>

            <li class="menu-title">{{ __('Web') }}</li>

            @if (auth()->user()->hasRole('Admin'))
                @can('Matches')
                    <li class="menu-item">
                        <a href="{{ route('admin.matches.index') }}" class="menu-link">
                            <span class="menu-icon"><i class="fe-aperture"></i></span>
                            <span class="menu-text"> {{ __('Matches') }} </span>
                        </a>
                    </li>
                @endcan
                @can('Feature Match')
                    <li class="menu-item">
                        <a href="{{ route('admin.featured.matches.edit') }}" class="menu-link">
                            <span class="menu-icon"><i class="fe-aperture"></i></span>
                            <span class="menu-text"> {{ __('Featured Match') }} </span>
                        </a>
                    </li>
                @endcan
                @can('News')
                    <li class="menu-item">
                        <a href="{{ route('admin.news.index') }}" class="menu-link">
                            <span class="menu-icon"><i class="fe-send"></i></span>
                            <span class="menu-text"> {{ __('News') }} </span>
                        </a>
                    </li>
                @endcan
                @can('Video')
                    <li class="menu-item">
                        <a href="{{ route('admin.videos.index') }}" class="menu-link">
                            <span class="menu-icon"><i class="fe-video"></i></span>
                            <span class="menu-text"> {{ __('Videos') }} </span>
                        </a>
                    </li>
                @endcan
                @can('League')
                    <li class="menu-item">
                        <a href="{{ route('admin.leagues.edit') }}" class="menu-link">
                            <span class="menu-icon"><i class="fe-globe"></i></span>
                            <span class="menu-text"> {{ __('Leagues') }} </span>
                        </a>
                    </li>
                @endcan
                @can('Season')
                    <li class="menu-item">
                        <a href="{{ route('admin.seasons.edit') }}" class="menu-link">
                            <span class="menu-icon"><i class="fe-calendar"></i></span>
                            <span class="menu-text"> {{ __('Seasons') }} </span>
                        </a>
                    </li>
                @endcan
                @can('Team')
                    <li class="menu-item">
                        <a href="{{ route('admin.teams.edit') }}" class="menu-link">
                            <span class="menu-icon"><i class="fe-user-plus"></i></span>
                            <span class="menu-text"> {{ __('Teams') }} </span>
                        </a>
                    </li>
                @endcan
                @can('Social')
                    <li class="menu-item">
                        <a href="{{ route('admin.socials.edit') }}" class="menu-link">
                            <span class="menu-icon"><i class="fe-rss"></i></span>
                            <span class="menu-text"> {{ __('Socials') }} </span>
                        </a>
                    </li>
                @endcan
                @can('Page')
                    <li class="menu-item">
                        <a href="{{ route('admin.pages.index') }}" class="menu-link">
                            <span class="menu-icon"><i class="fe-map"></i></span>
                            <span class="menu-text"> {{ __('Pages') }} </span>
                        </a>
                    </li>
                @endcan
                @can('Setting')
                    <li class="menu-item">
                        <a href="{{ route('admin.settings.create') }}" class="menu-link">
                            <span class="menu-icon"><i class="fe-settings "></i></span>
                            <span class="menu-text"> {{ __('Settings') }} </span>
                        </a>
                    </li>
                @endcan
                @can('User')
                    <li class="menu-item">
                        <a href="{{ route('admin.users.index') }}" class="menu-link">
                            <span class="menu-icon"><i class="fe-users"></i></span>
                            <span class="menu-text"> {{ __('Users') }} </span>
                        </a>
                    </li>
                @endcan
            @endif
        </ul>
        <!--- End Menu -->
        <div class="clearfix"></div>
    </div>
</div>
<!-- ========== Left menu End ========== -->
