@extends('vendor.installer.app')

@section('title', __('Football XT'))

@section('content')
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8 card">
            <div class="card-body">
                <h5 class="card-title text-center">{{ __('Football XT') }}</h5>
                <p class="card-text text-center">{{ env('APP_VERSION') }}</p>
                <hr>
                <h5 class="card-title text-center">{{ __('Welcome to the Installer !') }}</h5>
                <p class="card-text text-center">{{ __('Easy installation and setup wizard') }}</p>
                
            </div>
            <hr>
            <div class="card-footer text-muted text-center">
                <a href="{{ route('installers.check.requirements') }}" class="btn btn-primary waves-effect waves-light">{{ __('Start with checking requirements') }} </a>
            </div>
        </div>
        
    </div>
    <!-- end row -->
@endsection