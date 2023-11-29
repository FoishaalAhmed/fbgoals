@extends('vendor.installer.app')

@section('title', __('Verify Envento Purchase'))
@section('content')
    
    <div class="col-md-8 col-lg-6 col-xl-6">
        <div class="card bg-pattern">
            <form method="POST" action="{{ route('installers.verify.purchase') }}">
                @csrf
                <div class="card-body p-4">
                    <div class="text-center w-75 m-auto">
                        <p class="fw-bold mb-4 mt-3">{{ __('Verify Envato Purchase Code') }}</p>

                        @if(isset($responseError))
                            <div class="text-danger">
                                {{ $responseError }}
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="envato-username" class="form-label">{{ __('Envato Username') }}</label>
                        <input class="form-control" type="text" name="envato_username" id="envato-username" required="" placeholder="{{ __('Envato Username') }}">
                        @if(isset($errors))
                            <div class="invalid-feedback error">
                                {{ $errors->first('envato_username') }}
                            </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="envato-purchase-code" class="form-label">{{ __('Envato Purchase code') }}</label>
                        <div class="input-group input-group-merge">
                            <input type="text" name="envato_purchase_code" id="envato-purchase-code" class="form-control" required="" placeholder="{{ __('Envato Purchase code') }}">
                        </div>
                        @if(isset($errors))
                            <div class="invalid-feedback error">
                                {{ $errors->first('envato_purchase_code') }}
                            </div>
                        @endif
                    </div>
                </div> <!-- end card-body -->
                <div class="card-footer text-muted">
                    <a href="{{ route('installers.check.permissions') }}" class="btn btn-primary waves-effect waves-light"> <i class="fe-arrow-left"></i> {{ __('Cancel') }} </a>
                    <button class="btn btn-primary waves-effect waves-light float-right" type="submit"> {{ __('Verify Purchase Code') }} <i class="fe-arrow-right"></i> </button>
                </div>
            </form>
        </div>
        <!-- end card -->
    </div> <!-- end col -->
@endsection

            