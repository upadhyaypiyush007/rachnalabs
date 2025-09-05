@extends('admin.layouts.master')
@section('title',  __('Label.Package'))
@section('content')
 
    <!-- Start: Body-Content -->
    <div class="body-content">
      <!-- mobile title -->
      <h1 class="page-title-sm">@yield('title')</h1>

      <div class="border-bottom row mb-3">
        <div class="col-sm-10">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{__('Label.Dashboard')}}</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              {{__('Label.Package')}}
            </li>
          </ol>
        </div>
        <div class="col-sm-2 d-flex align-items-center justify-content-end" style="margin-top:-14px">
          <a href="{{ route('packageAdd') }}" class="btn btn-default mw-120">{{__('Label.Add Package')}}</a>
        </div>
      </div>
      
      <div class="table-responsive">
        <table class="table table-striped category-table text-center table-bordered">
          <thead>
            <tr style="background: #F9FAFF;">
              <th width="10px"> {{__('Label.Id')}} </th>
              <th width="80px"> {{__('Label.Name')}} </th>
              <th width="65px"> {{__('Label.Price')}} </th>
              
              <th width="65px"> {{__('Label.Action')}} </th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>
    <!-- End: Body-Content -->
  </div>
  <!-- End: Right Contenct -->
@endsection

@push('scripts')
  <script type="text/javascript">

    $(document).ready(function() {
      $(function () {
        var table = $('.category-table').DataTable({
          "responsive": true,
          "autoWidth": false,
          language: {
            paginate: {
              previous: "<img src='{{url('assets/imgs/left-arrow.png')}}' >",
              next: "<img src='{{url('assets/imgs/left-arrow.png')}}' style='transform: rotate(180deg)'>"
            }
          },
          lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, 'All'] ],
          processing: true,
          serverSide: false,
          order: [ [0, 'desc'] ],
          ajax: "{{ route('packageData') }}",
          columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name:'name'},
            {data: 'price', name:'price'},
           
            {data: 'action', name: 'action', orderable: false, searchable: false},
          ],
        });
      });
    });
  </script>
@endpush
