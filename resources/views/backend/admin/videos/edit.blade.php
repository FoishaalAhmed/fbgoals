@extends('backend.layouts.app')

@section('title', __('Update videos'))

@section('css')
    <link href="{{ asset('public/assets/backend/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/backend/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    @include('alert')
                    <div class="card-body">
                        <h4 class="header-title">{{ __('Update videos') }}</h4>
                        <p class="text-muted font-13 mb-4 text-end mt-n4">
                            <a href="{{ route('admin.videos.index') }}" class="btn btn-outline-primary waves-effect waves-light"><i class="fe-list"></i> {{ __('All videos') }}</a>
                        </p>
                        <form action="{{ route('admin.videos.update', $video->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <label for="basic-datepicker" class="form-label">{{ __('Date') }} <span class="text-danger"> * </span></label>
                                    <input type="text" name="date" id="basic-datepicker" class="form-control" placeholder="{{ __('Date') }}" required="" value="{{ old('date', $video->date) }}">
                                    @error('date')
                                        <div class="invalid-feedback error">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="title" class="form-label">{{ __('Title') }} <span class="text-danger"> * </span></label>
                                    <input type="text" name="title" id="title" class="form-control" placeholder="{{ __('Title') }}" required="" value="{{ old('title', $video->title) }}">
                                    @error('title')
                                        <div class="invalid-feedback error">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <label for="link" class="form-label">{{ __('Link') }} <small><i>- {{ __('only youtube link') }}</i></small> <span class="text-danger"> * </span></label>
                                    <input type="text" class="form-control" placeholder="{{ __('Link') }}" name="showLink" id="show-link" value="{{ old('showLink', 'https://www.youtube.com/watch?v=' .$video->link) }}" onkeyup="youtube_parser();">
                                    <input type="hidden" name="link" id="link" value="{{ old('link', $video->link) }}">
                                    
                                    @error('link')
                                        <div class="invalid-feedback error">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <a href="{{ route('admin.videos.index') }}" class="btn btn-outline-danger waves-effect waves-light"><i class="fe-delete"></i> {{ __('Cancel') }}</a>
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
    <script src="{{ asset('public/assets/backend/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('public/assets/backend/js/pages/form-pickers.init.js') }}"></script>
    <script src="{{ asset('public/assets/backend/js/custom/video.min.js') }}"></script> 
@endsection