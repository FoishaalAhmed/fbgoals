<style>
    .active {
        color: #3265E8;
    }
</style>
<div class="row" style="background: #272f46; margin-bottom: 10px;">
    <div class="col-md-2">
        <div class="nms-title" style="background: transparent">
            <h4><a href="{{ route('teams.matches', [$teamId, $name, 'league' => request()->league]) }}">{{ __('Fixture') }}</a></h4>
        </div>
    </div>
    <div class="col-md-2">
        <div class="nms-title" style="background: transparent">
            <h4><a href="{{ route('teams.recent', [$teamId, $name, 'league' => request()->league]) }}">{{ __('Recent') }}</a></h4>
        </div>
    </div>
    <div class="col-md-3">
        <div class="nms-title" style="background: transparent">
            <h4><a href="{{ route('teams.info', [$teamId, $name, 'league' => request()->league]) }}">{{ __('Information') }}</a></h4>
        </div>
    </div>

    @if (isset($leagueId))
        <div class="col-md-3">
            <div class="nms-title" style="background: transparent">
                <h4><a href="{{ route('teams.statistics', [$teamId, $name, 'league' => $leagueId]) }}">{{ __('Statistics') }}</a>
                </h4>
            </div>
        </div>
    @endif

    <div class="col-md-2">
        <div class="nms-title" style="background: transparent">
            <h4><a href="{{ route('teams.player', [$teamId, $name, 'league' => request()->league]) }}">{{ __('Player') }}</a>
            </h4>
        </div>
    </div>
</div>
