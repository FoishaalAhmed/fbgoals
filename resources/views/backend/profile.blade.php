@extends('backend.layouts.app')

@section('title', __('Profile'))

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">{{ __('Profile') }}</h4>
                    @include('alert')
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-lg-4 col-xl-4">
                <form action="{{ route('profile.photo') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card text-center">
                        <div class="card-body">
                            @if (file_exists(auth()->user()->photo))
                                <img src="{{ asset(auth()->user()->photo) }}" class="rounded-circle avatar-lg img-thumbnail"
                                    alt="profile-image" id="profile-photo">
                            @else
                                <img src="{{ asset('public/images/dummy/user.png') }}"
                                    class="rounded-circle avatar-lg img-thumbnail" alt="profile-image" id="profile-photo">
                            @endif
                            <p class="text-muted">{{ auth()->user()->name }}</p>

                            <div class="mb-3">
                                <input class="form-control" name="photo" type="file" id="profile-photo-input">
                            </div>

                            <button type="submit"
                                class="btn btn-outline-success waves-effect waves-light">{{ __('Update Photo') }}</button>
                        </div>
                    </div>
                </form>
                <!-- end card -->
            </div> <!-- end col-->

            <div class="col-lg-8 col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills nav-fill navtab-bg">
                            <li class="nav-item">
                                <a href="#persional-info" data-bs-toggle="tab" aria-expanded="false"
                                    class="nav-link active">
                                    {{ __('Persional Info') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#password" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                    {{ __('Password') }}
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane show active" id="persional-info">
                                <form action="{{ route('profile.info') }}" method="post">
                                    @csrf
                                    <!-- Name -->
                                    <div class="row mb-3">
                                        <label for="name" class="col-4 col-xl-2 col-form-label text-end">{{ __('Full Name') }}</label>
                                        <div class="col-8 col-xl-8">
                                            <input type="text" id="name" name="name" class="form-control"  placeholder="{{ __('Full Name') }}" value="{{ auth()->user()->name }}" required="">
                                            @error('name')
                                                <div class="invalid-feedback error">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Email -->
                                    <div class="row mb-3">
                                        <label for="email" class="col-4 col-xl-2 col-form-label text-end">{{ __('Email') }}</label>
                                        <div class="col-8 col-xl-8">
                                            <input type="email" id="email" name="email" class="form-control"
                                                placeholder="{{ __('Email') }}" value="{{ auth()->user()->email }}"
                                                required="">
                                            @error('email')
                                                <div class="invalid-feedback error">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                        <!-- Phone -->
                                    <div class="row mb-3">
                                        <label for="phone" class="col-4 col-xl-2 col-form-label text-end">{{ __('Phone') }}</label>
                                        <div class="col-8 col-xl-8">
                                            <input type="text" id="phone" name="phone" class="form-control"
                                                placeholder="{{ __('Phone') }}" value="{{ auth()->user()->phone }}"
                                                required="">
                                            @error('phone')
                                                <div class="invalid-feedback error">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Address -->
                                    <div class="row mb-3">
                                        <label for="address" class="col-4 col-xl-2 col-form-label text-end">{{ __('Address') }}</label>
                                        <div class="col-8 col-xl-8">
                                            <textarea class="form-control" name="address" placeholder="{{ __('Address') }}"
                                                id="address">{{ auth()->user()->address }}</textarea>
                                            @error('address')
                                                <div class="invalid-feedback error">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <button type="reset"
                                                class="btn btn-outline-danger waves-effect waves-light">{{ __('Reset') }}</button>
                                            <button type="submit"
                                                class="btn btn-outline-success waves-effect waves-light">{{ __('Submit') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- end persional-info section content -->

                            <div class="tab-pane" id="password">
                                <form action="{{ route('profile.password') }}" class="comment-area-box mt-2 mb-3"
                                    method="POST">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="old_password" class="col-4 col-xl-2 col-form-label text-end">{{ __('Old Password') }}</label>
                                        <div class="col-8 col-xl-8">
                                            <input type="password" id="old_password" name="old_password"
                                                class="form-control" placeholder="{{ __('Old Password') }}"
                                                required="">
                                            @error('old_password')
                                                <div class="invalid-feedback error">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="password" class="col-4 col-xl-2 col-form-label text-end">{{ __('New Password') }}</label>
                                        <div class="col-8 col-xl-8">
                                            <input type="password" id="password" name="password" class="form-control"
                                                placeholder="{{ __('New Password') }}" required="">
                                            @error('password')
                                                <div class="invalid-feedback error">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="password_confirmation" class="col-4 col-xl-2 col-form-label text-end">{{ __('Retype New Password') }}</label>
                                        <div class="col-8 col-xl-8">
                                            <input type="password" id="password_confirmation"
                                                name="password_confirmation" class="form-control"
                                                placeholder="{{ __('Retype New Password') }}" required="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <button type="reset"
                                                class="btn btn-outline-danger waves-effect waves-light">{{ __('Reset') }}</button>
                                            <button type="submit"
                                                class="btn btn-outline-success waves-effect waves-light">{{ __('Submit') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- end password content-->

                        </div> <!-- end tab-content -->
                    </div>
                </div> <!-- end card-->

            </div> <!-- end col -->
        </div>
        <!-- end row-->

    </div>
    <!-- container -->
@endsection

@section('js')
    <script src="{{ asset('public/assets/backend/js/custom/profile.min.js') }}"></script>
@endsection
