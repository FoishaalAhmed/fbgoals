@extends('backend.layouts.app')

@section('title', __('Socials'))

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    @include('alert')
                    <div class="card-body">
                        <h4 class="header-title mb-4">{{ __('Socials') }}</h4>
                        <form action="{{ route('admin.socials.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <label for="facebook" class="form-label">{{ __('Facebook') }}</label>
                                    <input type="text" name="facebook" id="facebook" class="form-control" placeholder="{{ __('Facebook') }}" value="{{ old('facebook', $social->facebook ?? '') }}">
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="twitter" class="form-label">{{ __('Twitter') }}</label>
                                    <input type="text" name="twitter" id="twitter" class="form-control" placeholder="{{ __('Twitter') }}" value="{{ old('twitter', $social->twitter ?? '') }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <label for="linkedin" class="form-label">{{ __('Linkedin') }}</label>
                                    <input type="text" name="linkedin" id="linkedin" class="form-control" placeholder="{{ __('Linkedin') }}" value="{{ old('linkedin', $social->linkedin ?? '') }}">
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="pinterest" class="form-label">{{ __('Pinterest') }}</label>
                                    <input type="text" name="pinterest" id="pinterest" class="form-control" placeholder="{{ __('Pinterest') }}" value="{{ old('pinterest', $social->pinterest ?? '') }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <label for="youtube" class="form-label">{{ __('Youtube') }}</label>
                                    <input type="text" name="youtube" id="youtube" class="form-control" placeholder="{{ __('Youtube') }}" value="{{ old('youtube', $social->youtube ?? '') }}">
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="instagram" class="form-label">{{ __('Instagram') }}</label>
                                    <input type="text" name="instagram" id="instagram" class="form-control" placeholder="{{ __('Instagram') }}" value="{{ old('instagram', $social->instagram ?? '') }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <a href="{{ route('admin.socials.edit') }}" class="btn btn-outline-danger waves-effect waves-light"><i class="fe-delete"></i> {{ __('Cancel') }}</a>
                                    <button type="submit" class="btn btn-outline-success waves-effect waves-light"><i class="fe-plus-circle"></i> {{ __('Submit') }}</button>
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