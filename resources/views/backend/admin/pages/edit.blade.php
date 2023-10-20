@extends('backend.layouts.app')

@section('title', __('Update Page'))

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    @include('alert')
                    <div class="card-body">
                        <h4 class="header-title">{{ __('Update Page') }}</h4>
                        <p class="text-muted font-13 mb-4 text-end mt-n4">
                            <a href="{{ route('admin.pages.index') }}" class="btn btn-outline-primary waves-effect waves-light"><i class="fe-list"></i> {{ __('All Page') }}</a>
                        </p>
                        <form action="{{ route('admin.pages.update', $page->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-4 mb-3">
                                    <label for="title" class="form-label">{{ __('Title') }}</label>
                                    <input type="text" name="title" id="title" class="form-control" placeholder="{{ __('Title') }}" required="" value="{{ $page->title }}">
                                    @error('title')
                                        <div class="invalid-feedback error">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label for="position" class="form-label">{{ __('Position') }}</label>
                                    <select class="form-select" name="position" id="example-select" required="">
                                        <option value="Header" {{ $page->position == 'Header' ? 'selected' : '' }}>{{ __('Header') }}</option>
                                        <option value="Footer" {{ $page->position == 'Footer' ? 'selected' : '' }}>{{ __('Footer') }}</option>
                                        <option value="Both" {{ $page->position == 'Both' ? 'selected' : '' }}>{{ __('Both') }}</option>
                                    </select>
                                    @error('position')
                                        <div class="invalid-feedback error">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label for="status" class="form-label">{{ __('Status') }}</label>
                                    <select class="form-select" name="status" id="example-select" required="">
                                        <option value="Active" {{ $page->status == 'Active' ? 'selected' : '' }}>{{ __('Active') }}</option>
                                        <option value="Inactive" {{ $page->status == 'Inactive' ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                                    </select>
                                    @error('position')
                                        <div class="invalid-feedback error">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <label for="content" class="form-label">{{ __('Content') }}</label>
                                    <textarea name="content" id="editor">{{ $page->content }}</textarea>
                                    @error('content')
                                        <div class="invalid-feedback error">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <a href="{{ route('admin.pages.index') }}" class="btn btn-outline-danger waves-effect waves-light"><i class="fe-delete"></i> {{ __('Cancel') }}</a>
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
    <script src="{{ asset('public/assets/backend/js/pages/form-pickers.init.js') }}"></script>
    <script src="{{ asset('public/assets/backend/js/custom/page.min.js') }}"></script> 
@endsection