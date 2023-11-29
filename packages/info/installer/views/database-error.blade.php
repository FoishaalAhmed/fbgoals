@extends('vendor.installer.app')

@section('title', __('Database Error'))
@section('content')

<div class="col-xl-8 col-lg-6 order-lg-1 order-xl-2">
    <!-- news -->
    <div class="card">
        <div class="card-body">
            <h4 class="header-title mb-1 text-center">{{ __('Database connection error') }}</h4>
            <hr>
            <p class="mb-1">{{ __('We cant connect to database with your settings :') }}</p>
            <div class="d-flex align-items-start mt-3 ml-2">
                <div class="w-100">
                    <span class="font-14 text-danger">
                        1. {{ __('Are you sure of your username and password ?') }}
                    </span>
                </div>
            </div>

            <div class="d-flex align-items-start ml-2">
                <div class="w-100">
                    <span class="font-14 text-danger">
                        2. {{ __('Are you sure of your host name ?') }}
                    </span>
                </div>
            </div>

            <div class="d-flex align-items-start ml-2">
                <div class="w-100">
                    <span class="font-14 text-danger">
                        3. {{ __('Are you sure that your database server is working ?') }}
                    </span>
                </div>
            </div>
            <p class="mt-3 mb-1">{{ __('If your are not very sure to understand all these terms you should contact your hoster.') }}</p>
        </div> <!-- end card-body-->
        <hr>
        <div class="card-footer text-muted">
            <a href="{{ route('installers.database.create') }}" class="btn btn-danger waves-effect waves-light"> <i class="fe-arrow-left"></i> {{ __('Try again !') }} </a>
        </div>
    </div> <!-- end card-->
</div>

@endsection
