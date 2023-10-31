@php
    $my_date_time = date('Y-m-d H:i:s');
@endphp
@if ($upcomingMatchData)
    @php
        $my_date_time = date('Y-m-d H:i:s', strtotime($upcomingMatchData[0]->fixture->date));
    @endphp
    <div class="widget">
        <h4>{{ $upcomingMatch->title }} </h4>
        <div class="last-match-widget">
            <p> <strong>{{ $upcomingMatchData[0]->league->name . ', ' . $upcomingMatchData[0]->league->country }}</strong>
                {{ date('d M, Y', strtotime($upcomingMatchData[0]->fixture->date)) }} |
                {{ date('h:i A', strtotime($upcomingMatchData[0]->fixture->date)) }} </p>
            <ul class="match-teams-vs">
                <li class="team-logo"><img src="{{ $upcomingMatchData[0]->teams->home->logo }}" class="width-50"> <strong>{{ $upcomingMatchData[0]->teams->home->name }}</strong> </li>
                <li class="mvs"> <span class="vs">VS</span> </li>
                <li class="team-logo"><img src="{{ $upcomingMatchData[0]->teams->away->logo }}" class="width-50">
                    <strong>{{ $upcomingMatchData[0]->teams->away->name }}</strong>
                </li>
            </ul>
            <p class="mloc"> <i class="fe-map-pin"></i>
                {{ $upcomingMatchData[0]->fixture->venue->name . ', ' . $upcomingMatchData[0]->fixture->venue->city }}
            </p>
            <div class="defaultCountdown is-countdown">
                <span class="countdown-row countdown-show4">
                    <span class="countdown-section"><span class="countdown-amount" id="day"></span><span
                            class="countdown-period">{{ __('Days') }}</span></span>
                    <span class="countdown-section"><span class="countdown-amount" id="hour"></span><span
                            class="countdown-period">{{ __('Hour') }}</span></span>
                    <span class="countdown-section"><span class="countdown-amount" id="min"></span><span
                            class="countdown-period">{{ __('Minutes') }}</span></span>
                    <span class="countdown-section"><span class="countdown-amount" id="sec"></span><span
                            class="countdown-period">{{ __('Seconds') }}</span></span>
                </span>
            </div>
        </div>
    </div>
@endif

@section('js')
    <script>
        'use script';
        var myDateTime = "{{ $my_date_time }}";
    </script>
    <script src="{{ asset('public/assets/front/js/upcoming.min.js') }}"></script>
@endsection
