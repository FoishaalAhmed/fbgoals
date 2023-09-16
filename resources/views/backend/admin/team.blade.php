@extends('backend.layouts.app')

@section('title', __('Teams'))

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    @include('alert')
                    <div class="card-body">
                        <h4 class="header-title mb-4">{{ __('Teams') }}</h4>
                        <form action="{{ route('admin.teams.update', $team->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <!-- Present Address -->
                                <div class="col-lg-12 mb-3">
                                    <label for="teams" class="form-label">{{ __('Present Address') }}</label>
                                    <textarea class="form-control" name="teams" placeholder="{{ __('Present Address') }}" id="teams" rows="5">{{ old('teams', $team->teams) }}</textarea>
                                    @error('teams')
                                        <div class="invalid-feedback error">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <a href="{{ route('admin.teams.edit') }}" class="btn btn-outline-danger waves-effect waves-light"><i class="fe-delete"></i> {{ __('Cancel') }}</a>
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