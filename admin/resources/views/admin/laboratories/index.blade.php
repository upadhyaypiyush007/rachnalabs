@extends('admin.layouts.master')
@section('title', __('Label.Laboratories'))
@section('content')

<div class="body-content">
    <h1 class="page-title-sm">@yield('title')</h1>

    <div class="border-bottom row mb-3">
        <div class="col-sm-10">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Label.Dashboard') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Label.Laboratories') }}</li>
            </ol>
        </div>
        <div class="col-sm-2 text-end">
            <a href="{{ route('admin.laboratories.create') }}" class="btn btn-primary">Add Laboratory</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped category-table text-center table-bordered">
            <thead>
                <tr style="background: #F9FAFF;">
                    <th>{{ __('Label.Id') }}</th>
                    <th>{{ __('Label.Name') }}</th>
                    <th>{{ __('Label.Address') }}</th>
                    <th>{{ __('Label.Cast') }}</th>
                    <th>{{ __('Label.Package') }}</th>
                    <th>{{ __('Label.Test') }}</th>
                    <th>{{ __('Label.User') }}</th>
                    <th>{{ __('Label.Status') }}</th>
                    <th>{{ __('Label.Action') }}</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('.category-table').DataTable({
        responsive: true,
        autoWidth: false,
        language: {
            paginate: {
                previous: "<img src='{{ url('assets/imgs/left-arrow.png') }}'>",
                next: "<img src='{{ url('assets/imgs/left-arrow.png') }}' style='transform: rotate(180deg)'>"
            }
        },
        lengthMenu: [
            [10, 25, 50, -1],
            [10, 25, 50, 'All']
        ],
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.laboratories.data') }}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'name', name: 'name' },
            { data: 'address', name: 'address' },
            { data: 'cast_name', name: 'cast_name' },
            { data: 'package_name', name: 'package_name' },
            { data: 'test_name', name: 'test_name' },
            { data: 'user_name', name: 'user_name' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });
});
</script>
@endpush
