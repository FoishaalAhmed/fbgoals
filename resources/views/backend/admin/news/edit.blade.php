@extends('backend.layouts.app')

@section('title', __('Update news'))

@section('css')
    <link rel="stylesheet" href="{{ asset('public/assets/backend/css/tagify.css') }}">
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
                        <h4 class="header-title">{{ __('Update news') }}</h4>
                        <p class="text-muted font-13 mb-4 text-end mt-n4">
                            <a href="{{ route('admin.news.index') }}" class="btn btn-outline-primary waves-effect waves-light"><i class="fe-list"></i> {{ __('All news') }}</a>
                        </p>
                        <form action="{{ route('admin.news.update', $news->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-lg-6 mb-3">
                                            <label for="basic-datepicker" class="form-label">{{ __('Date') }} <span class="text-danger"> * </span></label>
                                            <input type="text" name="date" id="basic-datepicker" class="form-control" placeholder="{{ __('Date') }}" required="" value="{{ old('date', $news->date) }}">
                                            @error('date')
                                                <div class="invalid-feedback error">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label for="title" class="form-label">{{ __('Title') }} <span class="text-danger"> * </span></label>
                                            <input type="text" name="title" id="title" class="form-control" placeholder="{{ __('Title') }}" required="" value="{{ old('title', $news->title) }}">
                                            @error('title')
                                                <div class="invalid-feedback error">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 mb-3">
                                            <label for="tags" class="form-label">{{ __('Tags') }} <span class="text-danger"> * </span></label>
                                            <input type="text" name="tags" id="tags" class="form-control" placeholder="{{ __('Tags') }}" required="" value="{{ old('tags', $news->tags) }}">
                                            @error('tags')
                                                <div class="invalid-feedback error">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label for="example-select" class="form-label">{{ __('Status') }} <span class="text-danger"> * </span></label>
                                            <select class="form-select" name="status" id="example-select" required="">
                                                <option value="Published" {{ $news->status == 'Published' ? 'selected' : '' }}>{{ __('Published') }}</option>
                                                <option value="Unpublished" {{ $news->status == 'Unpublished' ? 'selected' : '' }}>{{ __('Unpublished') }}</option>
                                            </select>
                                            @error('tags')
                                                <div class="invalid-feedback error">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 mb-3">
                                            <label for="content" class="form-label">{{ __('Content') }} <span class="text-danger"> * </span></label>
                                            <textarea name="content" id="editor" required>{{ old('content', $news->tags) }}</textarea>
                                            @error('content')
                                                <div class="invalid-feedback error">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card card-border">
                                        <img class="card-img-top img-fluid" id="news-photo" src="{{ file_exists($news->photo) ? asset($news->photo) : asset('public/images/dummy/news.avif') }}" alt="{{ __('News Image') }}">
                                        <div class="card-body">
                                            <input type="file" name="photo" class="form-control" id="news-photo-input">
                                            @error('photo')
                                                <div class="invalid-feedback error">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <a href="{{ route('admin.news.index') }}" class="btn btn-outline-danger waves-effect waves-light"><i class="fe-delete"></i> {{ __('Cancel') }}</a>
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
    <script src="{{ asset('public/assets/backend/js/pages/ckeditor.min.js') }}"></script>
    <script src="{{ asset('public/assets/backend/libs/tagify/jQuery.tagify.min.js') }}"></script>
    <script src="{{ asset('public/assets/backend/libs/tagify/tagify.min.js') }}"></script>
    <script src="{{ asset('public/assets/backend/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('public/assets/backend/js/pages/form-pickers.init.js') }}"></script>
    <script src="{{ asset('public/assets/backend/js/custom/news.min.js') }}"></script> 
@endsection