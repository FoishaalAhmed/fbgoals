@extends('vendor.installer.app')

@section('title', __('Database Setting'))
@section('content')
    
    <div class="col-md-8 col-lg-6 col-xl-6">
        <div class="card bg-pattern">
            <form method="POST" action="{{ route('installers.database.store') }}">
                @csrf
                <div class="card-body p-4">
                    <div class="text-center w-75 m-auto">
                        <p class="fw-bold mt-3">{{ __('Database setting') }}</p>
                        <p class="text-muted mb-4">{{ __('If you dont know how to fill this form contact your hoster') }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="dbname" class="form-label">{{ __('Database name (where you want your application to be)') }}</label>
                        <input class="form-control" type="text" name="dbname" id="dbname" required="" placeholder="{{ __('Database name (where you want your application to be)') }}" value="{{ $database }}">
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">{{ __('Username (Your database login)') }}</label>
                        <div class="input-group input-group-merge">
                            <input type="text" name="username" id="username" class="form-control" required="" placeholder="{{ __('Username (Your database login)') }}" value="{{ $username }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Password (Your database password)') }}</label>
                        <div class="input-group input-group-merge">
                            <input type="text" name="password" id="password" class="form-control" placeholder="{{ __('Password (Your database password)') }}" value="{{ $password }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="port" class="form-label">{{ __('Port (For MySQL use port 3306 and for MariaDB 3307)') }}</label>
                        <div class="input-group input-group-merge">
                            <input type="text" name="port" id="port" class="form-control" required="" placeholder="{{ __('Port (For MySQL use port 3306 and for MariaDB 3307)') }}" value="{{ $port }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="host" class="form-label">{{ __('Host name (should be localhost, if it does not work ask your hoster)') }}</label>
                        <div class="input-group input-group-merge">
                            <input type="text" name="host" id="host" class="form-control" required="" placeholder="{{ __('Host name (should be localhost, if it does not work ask your hoster)') }}" value="{{ $host }}" >
                        </div>
                    </div>
                </div> <!-- end card-body -->
                <div class="card-footer text-muted">
                    <a href="{{ route('installers.index') }}" class="btn btn-primary waves-effect waves-light"> <i class="fe-arrow-left"></i> {{ __('Cancel') }} </a>
                    <button class="btn btn-primary waves-effect waves-light float-right" type="submit"> {{ __('Create Database') }} <i class="fe-arrow-right"></i></button>
                </div>
            </form>
        </div>
        <!-- end card -->
    </div> <!-- end col -->
@endsection

            