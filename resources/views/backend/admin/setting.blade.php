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
                                <label for="large-logo"
                                    class="col-4 col-xl-2 offset-lg-3 col-form-label text-end">{{ __('Large Logo') }}</label>
                                <div class="col-8 col-xl-4">
                                    <input type="file" id="large-logo-input" class="form-control" name="large_logo">
                                    <p class="font-13 text-muted mb-2 fw-bolder">
                                        {{ __('*Recommended Dimension: 98 px * 20 px') }}</p>
                                    <img src="{{ asset(largeLogo()) }}" alt="{{ __('Large Logo') }}" class="large-logo"
                                        id="large-logo-photo">
                                    @error('large_logo')
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
