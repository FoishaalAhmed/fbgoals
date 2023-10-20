<!-- ========== Menu ========== -->
<div class="app-menu">

    <!-- Brand Logo -->
    <div class="logo-box">
        <!-- Brand Logo Light -->
        <a href="{{ url('/') }}" class="logo-light">
            {{-- <img src="{{ asset(largeLogo()) }}" alt="logo" class="logo-lg">
                <img src="{{ asset(smallLogo()) }}" alt="small logo" class="logo-sm"> --}}
        </a>

        <!-- Brand Logo Dark -->
        <a href="{{ url('/') }}" class="logo-dark">
            {{-- <img src="{{ asset(largeLogo()) }}" alt="dark logo" class="logo-lg">
                <img src="{{ asset(smallLogo()) }}" alt="small logo" class="logo-sm"> --}}
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
                <li class="menu-item">
                    <a href="{{ route('admin.leagues.edit') }}" class="menu-link">
                        <span class="menu-icon"><i class="fe-globe"></i></span>
                        <span class="menu-text"> {{ __('Leagues') }} </span>
                    </a>
                </li>

                <li class="menu-item">
                    <a href="{{ route('admin.seasons.edit') }}" class="menu-link">
                        <span class="menu-icon"><i class="fe-globe"></i></span>
                        <span class="menu-text"> {{ __('Seasons') }} </span>
                    </a>
                </li>

                <li class="menu-item">
                    <a href="{{ route('admin.teams.edit') }}" class="menu-link">
                        <span class="menu-icon"><i class="fe-globe"></i></span>
                        <span class="menu-text"> {{ __('Teams') }} </span>
                    </a>
                </li>

                <li class="menu-item">
                    <a href="{{ route('admin.featured.matches.edit') }}" class="menu-link">
                        <span class="menu-icon"><i class="fe-globe"></i></span>
                        <span class="menu-text"> {{ __('Featured Match') }} </span>
                    </a>
                </li>

                <li class="menu-item">
                    <a href="{{ route('admin.matches.index') }}" class="menu-link">
                        <span class="menu-icon"><i class="fe-globe"></i></span>
                        <span class="menu-text"> {{ __('Matches') }} </span>
                    </a>
                </li>

                <li class="menu-item">
                    <a href="{{ route('admin.news.index') }}" class="menu-link">
                        <span class="menu-icon"><i class="fe-globe"></i></span>
                        <span class="menu-text"> {{ __('News') }} </span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.videos.index') }}" class="menu-link">
                        <span class="menu-icon"><i class="fe-globe"></i></span>
                        <span class="menu-text"> {{ __('Videos') }} </span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.socials.edit') }}" class="menu-link">
                        <span class="menu-icon"><i class="fe-globe"></i></span>
                        <span class="menu-text"> {{ __('Socials') }} </span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.pages.index') }}" class="menu-link">
                        <span class="menu-icon"><i class="fe-globe"></i></span>
                        <span class="menu-text"> {{ __('Pages') }} </span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.settings.create') }}" class="menu-link">
                        <span class="menu-icon"><i class="fe-globe"></i></span>
                        <span class="menu-text"> {{ __('Settings') }} </span>
                    </a>
                </li>
            @endif
        </ul>
        <!--- End Menu -->
        <div class="clearfix"></div>
    </div>
</div>
<!-- ========== Left menu End ========== -->
