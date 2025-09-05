@extends('admin.layouts.master')
@section('title', 'Service')
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
      				<a href="{{ route('service') }}">Service</a>
      			</li>
      			<li class="breadcrumb-item active" aria-current="page">
      			Edit Service
      			</li>
      		</ol>
      	</div>
      	<div class="col-sm-2 d-flex align-items-center justify-content-end">
      		<a href="{{ route('service') }}" class="btn btn-default mw-120" style="margin-top:-14px">Service</a>
      	</div>
      </div>

      <div class="card custom-border-card mt-3">
      	<form method="post" action="{{ route('serviceUpdate') }}" id="save_edit_cast">
      		@csrf
      		<div class="form-row">
      			<div class="col-md-6 mb-3">
      				<div class="form-group">
      					<label for="name">{{__('Label.NAME')}}</label>
      					<input name="name" type="text" value="{{$result->name}}" class="form-control" autocomplete="off" id="name" placeholder="Please Enter Level">
      				</div>
      			</div>
      			<div class="col-md-6 mb-3">
					<div class="form-group">
						<label for="type">Category</label>
						<select class="form-control" id="type" name="type">
							<option value="">{{__('Label.Select Type')}}</option>
						<option value="1">Blood Test</option>
						</select>
					</div>
				</div>
      		</div>
      		<div class="form-row">
				<div class="form-group col-lg-12">
					<label>{{__('Label.Personal Info')}}</label>
					<textarea name="personal_info" class="form-control" rows="5" id="personal_info" placeholder="I am " autocomplete="off">{{$result->personal_info}}</textarea>
				</div>
            	</div>
			<div class="form-row">
				<div class="col-md-6 mb-3"> 
					<div class="form-group"> 
						<label for="image">{{__('Label.IMAGE')}}</label> 
						<input type="file" class="form-control" id="image" name="image" value="{{$result->image}}"> 
						<label class="mt-1 text-gray">{{__('Label.Note_Image')}}</label>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="custom-file ml-5">
							<?php 
								if($result->image){
									$app = Get_Image('service',$result->image);
								} else{
									$app = asset('assets/imgs/1.png');
								}
							?>
							<img  src="{{$app}}" height="120px" width="120px" id="preview-image-before-upload" class="img-thumbnail">
							<input type="hidden" name="old_image" value="{{$result->image}}">
						</div>
					</div>
				</div>
			</div>
      		<div class="border-top mt-2 pt-3 text-right">
      			<input type="hidden" value="{{$result->id}}" name="id">
      			<button type="button" class="btn btn-default mw-120" onclick="save_edit_cast()">{{__('Label.UPDATE')}}</button>
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

  	function save_edit_cast(){

  		var formData = new FormData($("#save_edit_cast")[0]);
  		$.ajax({
  			type:'POST',
  			url:'{{ route("serviceUpdate") }}',
  			data:formData,
  			cache:false,
  			contentType: false,
  			processData: false,
  			success:function(resp){
          get_responce_message(resp, 'save_edit_cast', '{{ route("service") }}');
  			},
  			error: function(XMLHttpRequest, textStatus, errorThrown) {
  				toastr.error(errorThrown.msg,'failed');         
  			}
  		});
  	}
  </script>
@endpush