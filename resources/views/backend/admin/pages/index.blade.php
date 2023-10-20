@extends('backend.layouts.app')

@section('title', __('All Page'))
@section('css')
    <!-- third party css -->
    <link href="{{ asset('public/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('public/assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}"
        rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    @include('alert')
                    <div class="card-body">
                        <h4 class="header-title">{{ __('All Page') }}</h4>
                        <p class="text-muted font-13 mb-4 text-end mt-n4">
                            <a href="{{ route('admin.pages.create') }}"
                                class="btn btn-outline-primary waves-effect waves-light"><i class="fe-plus-square"></i>
                                {{ __('New Page') }}</a>
                        </p>
                        <div class="table-responsive">
                            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>{{ __('Sl') }}</th>
                                        <th>{{ __('Title') }}</th>
                                        <th>{{ __('Position') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th>{{ __('Content') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pages as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $item->title }} </td>
                                            <td>{{ $item->position }} </td>
                                            <td>{{ $item->status }} </td>
                                            <td>{{ Str::limit($item->content, 100) }} </td>
                                            <td>
                                                <a href="{{ route('admin.pages.edit', $item->id) }}"
                                                    class="btn btn-outline-success waves-effect waves-light"><i
                                                        class="fe-edit"></i></a>
                                                <a href="{{ route('admin.pages.destroy', [$item->id]) }}" class="btn btn-outline-danger waves-effect waves-light delete-warning"><i class="fe-delete"></i></a>
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
    <script src="{{ asset('public/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('public/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('public/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <!-- Datatables init -->
    <script src="{{ asset('public/assets/js/pages/datatables.init.js') }}"></script>

@endsection
