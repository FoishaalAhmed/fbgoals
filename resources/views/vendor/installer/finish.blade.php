@extends('vendor.installer.app')

@section('title', __('Installation Complete'))
@section('content')
    
    <div class="col-md-8 col-lg-6 col-xl-6">
        <div class="card bg-pattern">
            <div class="card-body p-4">
                <div class="text-center w-75 m-auto">
                    <p class="fw-bold mt-3">{{ __('Installation Complete') }}</p>
                    <p class="text-muted mb-4">{{ __('Your application has been successfully installed!') }}</p>
                </div>
                <div class="text-center d-grid">
                    <a href="{{ route('login') }}" class="btn btn-primary waves-effect waves-light"> {{ __('Login') }} </a>
                </div>
            </div> <!-- end card-body -->
        </div>
        <!-- end card -->
    </div> <!-- end col -->
@endsection

            