@extends('backend.layouts.app')

@section('title', __('Update Match'))

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    @include('alert')
                    <div class="card-body">
                        <h4 class="header-title">{{ __('Update Match') }}</h4>
                        <p class="text-muted font-13 mb-4 text-end mt-n4">
                            <a href="{{ route('admin.matches.index') }}"
                                class="btn btn-outline-primary waves-effect waves-light"><i class="fe-list"></i>
                                {{ __('All Match') }}</a>
                        </p>
                        <form action="{{ route('admin.matches.update', $match->id) }}" method="post" id="match-update-form">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="matches"
                                    class="col-4 col-xl-2 offset-lg-3 col-form-label text-end">{{ __('Match') }} <span class="text-danger"> * </span> </label>
                                <div class="col-8 col-xl-4">
                                    <input type="text" id="matches" class="form-control" name="matches"
                                        placeholder="{{ __('Match') }}" required=""
                                        value="{{ old('matches', $match->matches) }}">
                                    @error('matches')
                                        <div class="invalid-feedback error">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="link"
                                    class="col-4 col-xl-2 offset-lg-3 col-form-label text-end">{{ __('Match Links') }} <span class="text-danger"> * </span></label>
                                <div class="col-8 col-xl-4">
                                    @forelse ($match->links as $item)
                                        <input type="text" id="link" class="form-control"
                                            placeholder="{{ __('Match Links') }}" name="links[]"
                                            value="{{ $item->link }}">
                                    @empty
                                        <input type="text" id="link" class="form-control"
                                            placeholder="{{ __('Match Links') }}" name="links[]"
                                            required="">
                                    @endforelse
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
                                    <textarea rows="5" name="details" id="details" class="form-control" placeholder="{{ __('Match Detail') }}">{{ old('details', $match->details) }}</textarea>
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
    <script src="{{ asset('public/assets/backend/js/custom/match/edit.min.js') }}"></script>
@endsection
