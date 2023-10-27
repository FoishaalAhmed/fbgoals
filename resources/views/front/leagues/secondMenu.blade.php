<style>
    .active {
        color: #3265E8;
    }
</style>
<div class="row" style="background: #272f46; margin-bottom: 10px;">
    <div class="col-md-3">
        <div class="nms-title" style="background: transparent">
            <h4><a class="{{ request()->is('league-matches/*') ? 'active' : '' }}" href="{{ route('leagues.matches', [$league, $name]) }}">{{ __('Fixture') }}</a></h4>
        </div>
    </div>
    <div class="col-md-3">
        <div class="nms-title" style="background: transparent">
            <h4><a class="{{ request()->is('league-recent-matches/*') ? 'active' : '' }}" href="{{ route('leagues.recent', [$league, $name]) }}">{{ __('Recent') }}</a></h4>
        </div>
    </div>
    <div class="col-md-3">
        <div class="nms-title" style="background: transparent">
            <h4><a class="{{ request()->is('league-standing/*') ? 'active' : '' }}" href="{{ route('leagues.standings', [$league, $name]) }}">{{ __('Standings') }}</a>
            </h4>
        </div>
    </div>
    <div class="col-md-3">
        <div class="nms-title" style="background: transparent">
            <h4><a class="{{ request()->is('league-scores/*') ? 'active' : '' }}" href="{{ route('leagues.scores', [$league, $name]) }}">{{ __('Top Score') }}</a></h4>
        </div>
    </div>
</div>


