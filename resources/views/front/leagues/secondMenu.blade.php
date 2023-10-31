<link rel="stylesheet" href="{{ asset('public/assets/front/css/secondmenu.min.css') }}">


<div class="row b-272f46-mb-10">
    <div class="col-md-3">
        <div class="nms-title b-transparent">
            <h4><a class="{{ request()->is('league-matches/*') ? 'active' : '' }}" href="{{ route('leagues.matches', [$league, $name]) }}">{{ __('Fixture') }}</a></h4>
        </div>
    </div>
    <div class="col-md-3">
        <div class="nms-title b-transparent">
            <h4><a class="{{ request()->is('league-recent-matches/*') ? 'active' : '' }}" href="{{ route('leagues.recent', [$league, $name]) }}">{{ __('Recent') }}</a></h4>
        </div>
    </div>
    <div class="col-md-3">
        <div class="nms-title b-transparent">
            <h4><a class="{{ request()->is('league-standing/*') ? 'active' : '' }}" href="{{ route('leagues.standings', [$league, $name]) }}">{{ __('Standings') }}</a>
            </h4>
        </div>
    </div>
    <div class="col-md-3">
        <div class="nms-title b-transparent">
            <h4><a class="{{ request()->is('league-scores/*') ? 'active' : '' }}" href="{{ route('leagues.scores', [$league, $name]) }}">{{ __('Top Score') }}</a></h4>
        </div>
    </div>
</div>


