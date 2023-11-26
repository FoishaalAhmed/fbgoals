@extends('backend.layouts.app')

@section('title', __('Update Ad'))

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    @include('alert')
                    <div class="card-body">
                        <h4 class="header-title mb-4">{{ __('Update Ad') }}</h4>
                        <form action="{{ route('admin.ads.update', $ad->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="ad" class="col-4 col-xl-2 offset-lg-3 col-form-label text-end">{{ __('Ad') }} </label>
                                <div class="col-8 col-xl-4">
                                    <textarea class="form-control" name="ad" placeholder="{{ __('Ad') }}" id="ad" rows="5">{{ old('ad', $ad->ad) }}</textarea>
                                    <b><i id="ad-help-text"></i></b>
                                    @error('ad')
                                        <div class="invalid-feedback error">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <a href="{{ route('admin.ads.index') }}" class="btn btn-outline-danger waves-effect waves-light"><i class="fe-delete"></i> {{ __('Cancel') }}</a>
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

@section('js')
    <script>
        'use strict';
        let position = "{{ $ad->position }}";
        let stickyMsg = "{{ __('Desktop Size: 970x90, Tab Size: 728x90, Mobile Size: 320x100') }}";
        let topMsg = "{{ __('Desktop Size: 970x90, Tab Size: 336x280, Mobile Size: 300x250') }}";
        let bottomMsg = "{{ __('Desktop Size: 728x90, Tab Size: 336x280, Mobile Size: 300x250') }}";
        let sidebarMsg = "{{ __('Desktop Size: 300x250, Tab Size: 300x250, Mobile Size: 300x250') }}";
    </script>
    <script src="{{ asset('public/assets/backend/js/custom/ad.js') }}"></script> 
@endsection