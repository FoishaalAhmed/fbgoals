@extends('backend.layouts.app')

@section('title', __('Season'))

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    @include('alert')
                    <div class="card-body">
                        <h4 class="header-title mb-4">{{ __('Season') }}</h4>
                        <form action="{{ route('admin.seasons.update', $season->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <!-- Season -->
                                <div class="col-lg-12 mb-3">
                                    <label for="season" class="form-label">{{ __('Season') }}</label>
                                    <textarea class="form-control" name="season" placeholder="{{ __('Season') }}" id="season" rows="5">{{ old('season', $season->season) }}</textarea>
                                    @error('season')
                                        <div class="invalid-feedback error">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <a href="{{ route('admin.seasons.edit') }}" class="btn btn-outline-danger waves-effect waves-light"><i class="fe-delete"></i> {{ __('Cancel') }}</a>
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