@extends('backend.layouts.app')

@section('title', __('All Ads'))
@section('css')
    <!-- third party css -->
    <link href="{{ asset('public/assets/backend/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/backend/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{ __('All Ads') }}</h4>
                        @include('alert')
                        <div class="table-responsive">
                            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>{{ __('Sl') }}</th>
                                        <th>{{ __('Position') }}</th>
                                        <th>{{ __('Ad') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ads as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $item->position }}</td>
                                            <td>{{ Str::limit(strip_tags($item->ad), 100) }}</td>
                                            
                                            <td>
                                                <a href="{{ route('admin.ads.edit', $item->id) }}" class="btn btn-outline-success waves-effect waves-light"><i class="fe-edit"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div> <!-- end card body-->
                </div> <!-- end card -->

            </div><!-- end col-->
        </div>
        <!-- end row-->

    </div> <!-- container -->
@endsection

@section('js')
    <!-- third party js -->
    <script src="{{ asset('public/assets/backend/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/assets/backend/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('public/assets/backend/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('public/assets/backend/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <!-- Datatables init -->
    <script src="{{ asset('public/assets/backend/js/pages/datatables.init.js') }}"></script>

@endsection
