@extends('errors.layouts.app')

@section('title', __('Not Found'))
@section('content')

    <div class="col-lg-6 col-xl-4">
        <div class="error-text-box">
            <svg viewBox="0 0 600 200">
                <!-- Symbol-->
                <symbol id="s-text">
                    <text text-anchor="middle" x="50%" y="50%" dy=".35em">404!</text>
                </symbol>
                <!-- Duplicate symbols-->
                <use class="text" xlink:href="#s-text"></use>
                <use class="text" xlink:href="#s-text"></use>
                <use class="text" xlink:href="#s-text"></use>
                <use class="text" xlink:href="#s-text"></use>
                <use class="text" xlink:href="#s-text"></use>
            </svg>
        </div>
        <div class="text-center">
            <h3 class="mt-0 mb-2">{{ __('Whoops! Page not found') }} </h3>
            <p class="text-muted mb-3">{{ __('Its looking like you may have taken a wrong turn. Do not worry...it happens to the best of us. You might want to check your internet connection.Here is a little tip that might help you get back on track.') }}</p>

            <a href="{{ url()->previous() }}" class="btn btn-success waves-effect waves-light">{{ __('Back') }}</a>
        </div>
        <!-- end row -->

    </div> <!-- end col -->

@endsection
                        