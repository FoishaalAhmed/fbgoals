<div class="auth-brand">
    <a href="{{ url('/') }}" class="logo logo-dark text-center">
        <span class="logo-lg">
            <img src="{{ asset(lightLogo()) }}" alt="" height="22">
        </span>
    </a>

    <a href="{{ url('/') }}" class="logo logo-light text-center">
        <span class="logo-lg">
            <img src="{{ asset(darkLogo()) }}" alt="" height="22">
        </span>
    </a>
</div>
@include('alert')