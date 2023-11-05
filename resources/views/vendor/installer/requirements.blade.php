@extends('vendor.installer.app')

@section('title', __('Requirements Check'))
@section('content')
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title text-center">{{ __('Server Requirements') }}</h4>
                    <hr>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <tbody>
                                @foreach ($requirements['requirements'] as $type => $requirement)
                                    <tr>
                                        <td class="fw-bold">{{ strtoupper($type) }}</td>
                                        @if ($type == 'php')
                                            <td class="fw-bold">
                                                {{ __('Version required (:x) ', ['x' => $phpSupportInfo['minimum']]) }}</td>
                                            <td class="fw-bold">
                                                {{ __('Current (:x)', ['x' => $phpSupportInfo['current']]) }}</td>
                                        @else
                                            <td></td>
                                            <td></td>
                                        @endif

                                        <td class="fw-bold">
                                            @if ($phpSupportInfo['supported'])
                                                <i class="fe-check-circle text-success"></i>
                                            @else
                                                <i class="fe-slash text-danger"></i>
                                            @endif

                                        </td>
                                    </tr>
                                    @foreach ($requirements['requirements'][$type] as $extention => $enabled)
                                        <tr>
                                            <td>{{ ucfirst($extention) }}</td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                @if ($enabled)
                                                    <i class="fe-check-circle text-success"></i>
                                                @else
                                                    <i class="fe-slash text-danger"></i>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <a href="{{ route('installers.index') }}"
                        class="btn btn-primary waves-effect waves-light"> <i class="fe-arrow-left"></i> {{ __('Cancel') }} </a>
                    <a href="{{ route('installers.check.permissions') }}"
                        class="btn btn-primary waves-effect waves-light float-right">{{ __('Check Permission') }} <i class="fe-arrow-right"></i> </a>
                </div>
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>
@endsection
