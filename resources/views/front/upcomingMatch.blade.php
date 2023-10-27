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
                <li class="team-logo"><img src="{{ $upcomingMatchData[0]->teams->home->logo }}" alt=""
                        style="width: 50px;"> <strong>{{ $upcomingMatchData[0]->teams->home->name }}</strong> </li>
                <li class="mvs"> <span class="vs">VS</span> </li>
                <li class="team-logo"><img src="{{ $upcomingMatchData[0]->teams->away->logo }}" alt=""
                        style="width: 50px;">
                    <strong>{{ $upcomingMatchData[0]->teams->away->name }}</strong>
                </li>
            </ul>
            <p class="mloc"> <i class="fas fa-location-arrow"></i>
                {{ $upcomingMatchData[0]->fixture->venue->name . ', ' . $upcomingMatchData[0]->fixture->venue->city }}
            </p>
            <div class="defaultCountdown is-countdown">
                <span class="countdown-row countdown-show4">
                    <span class="countdown-section"><span class="countdown-amount" id="day"></span><span
                            class="countdown-period">Days</span></span>
                    <span class="countdown-section"><span class="countdown-amount" id="hour"></span><span
                            class="countdown-period">Hour</span></span>
                    <span class="countdown-section"><span class="countdown-amount" id="min"></span><span
                            class="countdown-period">Minutes</span></span>
                    <span class="countdown-section"><span class="countdown-amount" id="sec"></span><span
                            class="countdown-period">Seconds</span></span>
                </span>
            </div>
        </div>
    </div>
@endif


<script>
    // Set the date we're counting down to
    var countDownDate = new Date("{{ $my_date_time }}").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result in an element with id="demo"
        document.getElementById("day").innerHTML = days;
        document.getElementById("hour").innerHTML = hours;
        document.getElementById("min").innerHTML = minutes;
        document.getElementById("sec").innerHTML = seconds;

        // If the count down is over, write some text 
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("day").innerHTML = '0';
            document.getElementById("hour").innerHTML = '0';
            document.getElementById("min").innerHTML = '0';
            document.getElementById("sec").innerHTML = '0';
        }
    }, 1000);
</script>
