@extends('backend.layouts.app')

@section('title', __('New Match'))

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    @include('alert')
                    <div class="card-body">
                        <h4 class="header-title">{{ __('New Match') }}</h4>
                        <p class="text-muted font-13 mb-4 text-end mt-n4">
                            <a href="{{ route('admin.matches.index') }}"
                                class="btn btn-outline-primary waves-effect waves-light"><i class="fe-list"></i>
                                {{ __('All Match') }}</a>
                        </p>
                        <form action="{{ route('admin.matches.store') }}" method="post" id="match-store-form">
                            @csrf
                            <div class="row mb-3">
                                <label for="matches"
                                    class="col-4 col-xl-2 offset-lg-3 col-form-label text-end">{{ __('Match') }}</label>
                                <div class="col-8 col-xl-4">
                                    <input type="text" id="matches" class="form-control" name="matches"
                                        placeholder="{{ __('Match') }}" required="" value="{{ old('matches') }}">
                                    @error('matches')
                                        <div class="invalid-feedback error">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="link"
                                    class="col-4 col-xl-2 offset-lg-3 col-form-label text-end">{{ __('Match Links') }}</label>
                                <div class="col-8 col-xl-4">
                                    <input type="text" id="link" class="form-control"
                                        placeholder="{{ __('Match Links') }}" name="links[]">
                                    <span id="links"></span>
                                    @error('links')
                                        <div class="invalid-feedback error">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="details"
                                    class="col-4 col-xl-2 offset-lg-3 col-form-label text-end">{{ __('Details') }}</label>
                                <div class="col-8 col-xl-4">
                                    <textarea rows="5" name="details" id="details" class="form-control" placeholder="{{ __('Match Detail') }}">{{ old('details') }}</textarea>
                                    @error('details')
                                        <div class="invalid-feedback error">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <a href="{{ route('admin.matches.index') }}"
                                        class="btn btn-outline-danger waves-effect waves-light"><i class="fe-delete"></i>
                                        {{ __('Cancel') }}</a>
                                    <button type="button" class="btn btn-outline-success waves-effect waves-light"
                                        id="submit-btn"><i class="fe-plus-circle"></i> {{ __('Submit') }}</button>
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
        let matchLink = "{{ __('Match Links') }}";
    </script>
    <script src="{{ asset('public/customs/admin/match/create.min.js') }}"></script>
@endsection
