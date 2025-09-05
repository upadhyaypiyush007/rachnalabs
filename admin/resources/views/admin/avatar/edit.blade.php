@extends('admin.layouts.master')
@section('title', 'Edit State')
@section('content')

    <!-- Start: Body-Content -->
    <div class="body-content">
      <!-- mobile title -->
      <h1 class="page-title-sm">@yield('title')</h1>

      <div class="border-bottom row mb-3">
        <div class="col-sm-10">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{ route('dashboard') }}">{{__('Label.Dashboard')}}</a>
            </li>
            <li class="breadcrumb-item">
              <a href="{{ route('Avatar') }}">State</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              Edit State
            </li>
          </ol>
        </div>
        <div class="col-sm-2 d-flex align-items-center justify-content-end">
          <a href="{{ route('Avatar') }}" class="btn btn-default mw-120" style="margin-top:-14px">State</a>
        </div>
      </div>

      <div class="card custom-border-card mt-3">
      	<form enctype="multipart/form-data" id="save_edit_avatar">
      		@csrf
      		<div class="form-row">
      			<div class="col-md-12 mb-3">
      				<div class="form-group">
      					<label for="name">{{__('Label.NAME')}}</label>
      					<input name="name" type="text" class="form-control" id="name" value="{{$result->state}}" autocomplete="off" placeholder="{{__('Label.Please Enter Category')}}">
      				</div>
      			</div>
      		</div>
      	
      		<div class="border-top mt-2 pt-3 text-right">
      			<input type="hidden" value="{{$result->id}}" name="id">
      			<button type="button" class="btn btn-default mw-120" onclick="save_edit_avatar()">{{__('Label.UPDATE')}}</button>
      		</div>
      	</form>
      </div>
    </div>
    <!-- End: Body-Content -->
  </div>
 <!-- End: Right Contenct -->
@endsection

@push('scripts')
  <script type="text/javascript">

    function save_edit_avatar(){
      var formData = new FormData($("#save_edit_avatar")[0]);
      $("#dvloader").show();
      $.ajax({
        type:'POST',
        url:'{{ route("AvatarUpdate") }}',
        data:formData,
        cache:false,
        contentType: false,
        processData: false,
        success:function(resp){
          $("#dvloader").hide();
          get_responce_message(resp, 'save_edit_avatar', '{{ route("Avatar") }}');
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
          $("#dvloader").hide();
          toastr.error(errorThrown.msg,'failed');         
        }
      });
    }
  </script>
@endpush