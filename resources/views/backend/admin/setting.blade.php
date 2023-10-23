@extends('backend.layouts.app')

@section('title', __('System Settings'))

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    @include('alert')
                    <div class="card-body">
                        <h4 class="header-title">{{ __('System Settings') }}</h4>
                        <form action="{{ route('admin.settings.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="dark-logo"
                                    class="col-4 col-xl-2 offset-lg-3 col-form-label text-end">{{ __('Dark Logo') }}</label>
                                <div class="col-8 col-xl-4">
                                    <input type="file" id="dark-logo-input" class="form-control" name="dark_logo">
                                    <p class="font-13 text-muted mb-2 fw-bolder">
                                        {{ __('*Recommended Dimension: 98 px * 20 px') }}</p>
                                    <img src="{{ asset(darkLogo()) }}" alt="{{ __('Dark Logo') }}" class="large-logo"
                                        id="dark-logo-photo">
                                    @error('dark_logo')
                                        <div class="invalid-feedback error">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="light-logo"
                                    class="col-4 col-xl-2 offset-lg-3 col-form-label text-end">{{ __('Light Logo') }}</label>
                                <div class="col-8 col-xl-4">
                                    <input type="file" id="light-logo-input" class="form-control" name="light_logo">
                                    <p class="font-13 text-muted mb-2 fw-bolder">
                                        {{ __('*Recommended Dimension: 98 px * 20 px') }}</p>
                                    <img src="{{ asset(lightLogo()) }}" alt="{{ __('Light Logo') }}" class="large-logo"
                                        id="light-logo-photo">
                                    @error('light_logo')
                                        <div class="invalid-feedback error">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="small-logo"
                                    class="col-4 col-xl-2 offset-lg-3 col-form-label text-end">{{ __('Small Logo') }}</label>
                                <div class="col-8 col-xl-4">
                                    <input type="file" id="small-logo-input" class="form-control" name="small_logo">
                                    <p class="font-13 text-muted mb-2 fw-bolder">
                                        {{ __('*Recommended Dimension: 22 px * 22 px') }}</p>
                                    <img src="{{ asset(smallLogo()) }}" alt="{{ __('Small Logo') }}" class="small-logo"
                                        id="small-logo-photo">
                                    @error('small_logo')
                                        <div class="invalid-feedback error">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="favicon"
                                    class="col-4 col-xl-2 offset-lg-3 col-form-label text-end">{{ __('Favicon') }}</label>
                                <div class="col-8 col-xl-4">
                                    <input type="file" id="favicon-input" class="form-control" name="favicon">
                                    <p class="font-13 text-muted mb-2 fw-bolder">
                                        {{ __('*Recommended Dimension: 22 px * 22 px') }}</p>

                                    <img src="{{ asset(getFavIcon()) }}" alt="{{ __('Favicon') }}" class="small-logo"
                                        id="favicon-photo">

                                    @error('favicon')
                                        <div class="invalid-feedback error">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name"
                                    class="col-4 col-xl-2 offset-lg-3 col-form-label text-end">{{ __('Name') }}</label>
                                <div class="col-8 col-xl-4">
                                    <input type="text" id="name" class="form-control" name="name" required=""
                                        placeholder="{{ __('Name') }}" value="{{ settings('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback error">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email"
                                    class="col-4 col-xl-2 offset-lg-3 col-form-label text-end">{{ __('Email') }}</label>
                                <div class="col-8 col-xl-4">
                                    <input type="email" id="email" class="form-control" name="email"
                                        placeholder="{{ __('Email') }}" value="{{ settings('email') }}">
                                    @error('email')
                                        <div class="invalid-feedback error">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="phone"
                                    class="col-4 col-xl-2 offset-lg-3 col-form-label text-end">{{ __('Phone') }}</label>
                                <div class="col-8 col-xl-4">
                                    <input type="text" id="phone" class="form-control" name="phone" 
                                        placeholder="{{ __('Phone') }}" value="{{ settings('phone') }}">
                                    @error('phone')
                                        <div class="invalid-feedback error">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="address"
                                    class="col-4 col-xl-2 offset-lg-3 col-form-label text-end">{{ __('Address') }}</label>
                                <div class="col-8 col-xl-4">
                                    <input type="text" id="address" class="form-control" name="address"
                                        placeholder="{{ __('Address') }}" value="{{ settings('address') }}">
                                    @error('address')
                                        <div class="invalid-feedback error">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="google_tracking"
                                    class="col-4 col-xl-2 offset-lg-3 col-form-label text-end">{{ __('Google Analytics Tracking Code') }}</label>
                                <div class="col-8 col-xl-4">
                                    <textarea name="google_tracking" class="form-control" id="google_tracking" rows="5" placeholder="{{ __('Google Analytics Tracking Code') }}">{{ settings('google_tracking') }}</textarea>
                                    @error('google_tracking')
                                        <div class="invalid-feedback error">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <a href="{{ route('admin.settings.create') }}"
                                        class="btn btn-outline-danger waves-effect waves-light"><i class="fe-delete"></i>
                                        {{ __('Cancel') }}</a>
                                    <button type="submit" class="btn btn-outline-success waves-effect waves-light"><i
                                            class="fe-plus-circle"></i> {{ __('Submit') }}</button>
                                </div>
                            </div>
                        </form>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->

    </div> <!-- container -->
@endsection

@section('js')
    <script src="{{ asset('public/assets/backend/js/custom/setting.min.js') }}"></script>
@endsection
