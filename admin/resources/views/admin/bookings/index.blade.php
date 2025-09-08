@extends('admin.layouts.master')
@section('title', __('Label.Bookings'))
@section('content')

    <div class="body-content">
        <h1 class="page-title-sm">@yield('title')</h1>

        <div class="border-bottom row mb-3">
            <div class="col-sm-10">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Label.Dashboard') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Label.Bookings') }}</li>
                </ol>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped category-table text-center table-bordered">
                <thead>
                    <tr style="background: #F9FAFF;">
                        <th>{{ __('Label.Id') }}</th>
                        <th> {{ __('Label.Image') }} </th>
                        <th>{{ __('Label.Booking ID') }}</th>
                        <th>{{ __('Label.User') }}</th>
                        <th>{{ __('Label.Type') }}</th>
                        <th>{{ __('Label.Amount') }}</th>
                        <th>{{ __('Label.Status') }}</th>
                        <th>{{ __('Label.payment_id') }}</th>
                        <th>{{ __('Label.Date') }}</th>
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
                ajax: "{{ route('admin.bookings.data') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'image_url',
                        name: 'image_url',
                        render: function(data, type, full, meta) {
                            if (data) {
                                return '<img src="' + data +
                                    '" height="50" width="50" class="rounded-circle"/>';
                            } else {
                                return '<img src="{{ asset('assets/imgs/1.png') }}" height="50" width="50" class="rounded-circle"/>';
                            }
                        }
                    },
                    {
                        data: 'booking_id',
                        name: 'booking_id'
                    },
                    {
                        data: 'user_name',
                        name: 'user_name'
                    },
                    {
                        data: 'booking_type',
                        name: 'booking_type'
                    },
                    {
                        data: 'amount',
                        name: 'amount'
                    },
                    {
                        data: 'payment_status',
                        name: 'payment_status'
                    },
                    {
                        data: 'payment_id',
                        name: 'payment_id'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
        });
    </script>
@endpush
