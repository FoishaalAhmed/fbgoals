@extends('vendor.installer.app')

@section('title', __('Permission Check'))
@section('content')
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title text-center">{{ __('Folder permissions') }}</h4>
                    <hr>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <tbody>
                                @foreach($permissions['permissions'] as $permission)
                                    <tr>
                                        <td class="fw-bold">{{ $permission['folder'] }}</td>
                                        <td class="fw-bold">
                                            @if ($permission['isActive'])
                                                <i class="fe-check-circle text-success"></i>
                                            @else
                                                <i class="fe-slash text-danger"></i>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <a href="{{ route('installers.check.requirements') }}" class="btn btn-primary waves-effect waves-light"> <i class="fe-arrow-left"></i> {{ __('Cancel') }} </a>
                    @if (!isset($permissions['errors']))
                        <a href="{{ route('installers.verify.purchase') }}" class="btn btn-primary waves-effect waves-light float-right">{{ __('Verify Envato Purchase code') }} <i class="fe-arrow-right"></i> </a>
                    @else
                        <a href="javascript:;" class="btn btn-primary waves-effect waves-light float-right">{{ __('Verify Envato Purchase code') }} <i class="fe-arrow-right"></i> </a>
                    @endif
                </div>
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>
@endsection
