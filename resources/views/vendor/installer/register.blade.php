@extends('vendor.installer.app')

@section('title', __('Administrator creation'))
@section('content')
    
    <div class="col-md-8 col-lg-6 col-xl-6">
        <div class="card bg-pattern">
            <form method="POST" action="{{ route('installers.user.store') }}">
                @csrf
                <div class="card-body p-4">
                    <div class="text-center w-75 m-auto">
                        <p class="fw-bold mt-3">{{ __('Administrator Creation') }}</p>
                        <p class="text-muted mb-4">{{ __('Now you must enter information to create administrator') }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('Your Name') }}</label>
                        <input class="form-control" type="text" name="name" id="name" required="" placeholder="{{ __('Your Name') }}" value="{{ old('name') }}">
                        @if(isset($errors))
                            <div class="invalid-feedback error">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Your Email') }}</label>
                        <div class="input-group input-group-merge">
                            <input type="text" name="email" id="email" class="form-control" required="" placeholder="{{ __('Your Email') }}" value="{{ old('email') }}">
                        </div>
                        @if(isset($errors))
                            <div class="invalid-feedback error">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Your Password') }}</label>
                        <div class="input-group input-group-merge">
                            <input type="text" name="password" id="password" class="form-control" placeholder="{{ __('Your Password') }}">
                        </div>
                        @if(isset($errors))
                            <div class="invalid-feedback error">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>
                    <div class="text-center d-grid">
                        <p><em>{{ __('You will need your password to login, so keep it safe !') }}</em></p>
                        <button class="btn btn-primary waves-effect waves-light" type="submit"> {{ __('Create Administrator') }} </button>
                    </div>
                </div> <!-- end card-body -->
            </form>
        </div>
        <!-- end card -->
    </div> <!-- end col -->
@endsection

            