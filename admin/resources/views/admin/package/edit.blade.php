@extends('admin.layouts.master')
@section('title', __('Label.Edit Package'))
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
              <a href="{{ route('package') }}">{{__('Label.Package')}}</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                {{__('Label.Edit Package')}}
            </li>
          </ol>
        </div>
        <div class="col-sm-2 d-flex align-items-center justify-content-end">
          <a href="{{ route('package') }}" class="btn btn-default mw-120" style="margin-top:-14px">{{__('Label.Package List')}}</a>
        </div>
      </div>

      <div class="card custom-border-card mt-3">
      	<form enctype="multipart/form-data" id="save_edit_package">
      		@csrf
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <div class="form-group">
                <label for="name">{{__('Label.NAME')}}</label>
                <input name="name" type="text" class="form-control" id="name" autocomplete="off" placeholder="{{__('Label.Enter Package Name')}}" value="{{$result->name}}">
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <div class="form-group">
                <label for="price">{{__('Label.Price')}}</label>
                <input name="price" type="number" class="form-control" id="price" autocomplete="off" placeholder="{{__('Label.Enter Package Price')}}" value="{{$result->price}}">
              </div>
            </div>
          </div>
          
       
       
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <div class="form-group">
                <label for="name">Package Detail</label>
                <textarea name="android_product_package" type="text" class="form-control" placeholder="Enter Android Product Package" >{{$result->android_product_package}}</textarea>
              </div>
            </div>
           
          </div>
      		<div class="border-top mt-2 pt-3 text-right">
      			<input type="hidden" value="{{$result->id}}" name="id">
      			<button type="button" class="btn btn-default mw-120" onclick="save_edit_package()">{{__('Label.UPDATE')}}</button>
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

    function save_edit_package(){
      var formData = new FormData($("#save_edit_package")[0]);
      $("#dvloader").show();
      $.ajax({
        type:'POST',
        url:'{{ route("packageUpdate") }}',
        data:formData,
        cache:false,
        contentType: false,
        processData: false,
        success:function(resp){
          $("#dvloader").hide();
          get_responce_message(resp, 'save_edit_package', '{{ route("package") }}');
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
          $("#dvloader").hide();
          toastr.error(errorThrown.msg,'failed');         
        }
      });
    }
  
    $(document).ready(function() {
      $("#type_id").select2();
      $(".selectd2").select2({
        placeholder: "{{__('Label.Select Type')}}"
      });

      var validity_type = "<?php echo $result->type; ?>";
      if (validity_type == "Day") {
        for (let i = 8; i <= 31; i++) {
                      $(".time option[value="+i+"]").hide();
                  }
      } else if (validity_type == "Week") {
        for (let i = 5; i <= 31; i++) {
                      $(".time option[value="+i+"]").hide();
                  }
      }  else if (validity_type == "Month") {
        for (let i = 13; i <= 31; i++) {
                      $(".time option[value="+i+"]").hide();
                  }
      } else if (validity_type == "Year") {
        for (let i = 2; i <= 31; i++) {
                      $(".time option[value="+i+"]").hide();
                  }
      } else {
        $('.time').hide();
      }
    });

    $('#validity_type').on('click', function() {
      $('.time').show();
			var type = $("#validity_type").val()

      for (let i = 1; i <= 31; i++) {
        $(".time option[value="+i+"]").show();
        $(".time option[value="+i+"]").attr("selected", false);
      }

			if (type == "Day") {
        for (let i = 8; i <= 31; i++) {
          $(".time option[value="+i+"]").hide();
        }
      } else if (type == "Week") {
        for (let i = 5; i <= 31; i++) {
          $(".time option[value="+i+"]").hide();
        }
      } else if (type == "Month") {
        for (let i = 13; i <= 31; i++) {
          $(".time option[value="+i+"]").hide();
        }
      } else if (type == "Year") {
        for (let i = 2; i <= 31; i++) {
          $(".time option[value="+i+"]").hide();
        }
      } else {
        $('.time').hide();
      }
		})
  </script>
@endpush