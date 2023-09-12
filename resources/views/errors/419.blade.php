@extends('errors.layouts.app')

@section('title', __('Page Expired'))
@section('content')

    <div class="col-lg-6 col-xl-4">
        <div class="error-text-box">
            <svg viewBox="0 0 600 200">
                <!-- Symbol-->
                <symbol id="s-text">
                    <text text-anchor="middle" x="50%" y="50%" dy=".35em">419!</text>
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
            <h3 class="mt-0 mb-2">{{ __('Page Expired') }} </h3>
            <a href="{{ url()->previous() }}" class="btn btn-success waves-effect waves-light">{{ __('Back') }}</a>
        </div>
        <!-- end row -->

    </div> <!-- end col -->

@endsection
