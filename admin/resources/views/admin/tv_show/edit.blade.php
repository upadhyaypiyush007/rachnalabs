@extends('admin.layouts.master')
@section('title', __('Label.Edit TV Show'))
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
                    <a href="{{ route('TVShow') }}">{{__('Label.TV Show')}}</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{__('Label.Edit TV Show')}}
                </li>
            </ol>
        </div>
        <div class="col-sm-2 d-flex align-items-center justify-content-end">
            <a href="{{ route('TVShow') }}" class="btn btn-default mw-120" style="margin-top:-14px">{{__('Label.TV Show')}}</a>
        </div>
    </div>

    <div class="card custom-border-card mt-3">
        <form enctype="multipart/form-data" id="edit_TVShow">
            @csrf
            <input type="hidden" name="id" class="form-control" value="{{$result->id}}" id="id ">
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <div class="form-group">
                        <label for="name">{{__('Label.Name')}}</label>
                        <input name="name" type="text" class="form-control" id="name" value="{{$result->name}}">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label>{{__('Label.Type')}}</label>
                        <select class="form-control" name="type_id">
                            <option value=""> {{__('Label.Select Type')}}</option>
                            @foreach ($type as $key => $value)
                            <option value="{{ $value->id}}" {{ $result->type_id == $value->id  ? 'selected' : ''}}>
                                {{ $value->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="channel_id">{{__('Label.Channel')}}</label>
                        <select class="form-control" id="channel_id" name="channel_id">
                            <option value="">{{__('Label.Select Channel')}}</option>
                            @foreach ($channel as $key => $value)
                            <option value="{{ $value->id}}" {{ $result->channel_id == $value->id  ? 'selected' : ''}}>
                                {{ $value->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <?php 
                            $x = explode(",",$result->category_id);
                        ?>
                        <label for="category_id">{{__('Label.Category')}}</label>
                        <select class="form-control selectd2" style="width:100%!important;" name="category_id[]" multiple id="category_id">
                            <option value="" hidden>{{__('Label.Select Category')}}</option>
                            @foreach ($category as $key => $value)
                            <option value="{{ $value->id}}" {{(in_array($value->id, $x)) ? 'selected' : ''}}>
                                {{ $value->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <?php 
                            $y = explode(",",$result->language_id);
                        ?>
                        <label for="language_id">{{__('Label.Language')}}</label>
                        <select class="form-control  selectd2_1" style="width:100%!important;" name="language_id[]" id="language_id" multiple>
                            @foreach ($language as $key => $value)
                            <option value="{{ $value->id}}" {{(in_array($value->id, $y)) ? 'selected' : ''}}>
                                {{ $value->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <?php 
                            $z = explode(",",$result->cast_id);
                        ?>
                        <label for="cast_id">{{__('Label.Cast')}}</label>
                        <select class="form-control selectd2_2" style="width:100%!important;" name="cast_id[]" multiple id="cast_id">
                            @foreach ($cast as $key => $value)
                            <option value="{{ $value->id}}" {{(in_array($value->id, $z)) ? 'selected' : ''}}>
                                {{ $value->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="video_type">{{__('Label.Video Type')}}</label>
                        <select class="form-control" name="video_type" id="video_type">
                            <option value="">{{__('Label.Select Video Type')}}</option>
                            <option value="1" {{ $result->video_type == 1  ? 'selected' : ''}}>{{__('Label.Video')}}</option>
                            <option value="2" {{ $result->video_type == 2  ? 'selected' : ''}}>{{__('Label.Show')}}</option>
                            <option value="3" {{ $result->video_type == 3  ? 'selected' : ''}}>{{__('Label.Language')}}</option>
                            <option value="4" {{ $result->video_type == 4  ? 'selected' : ''}}>{{__('Label.Category')}}</option>
                            <option value="5" {{ $result->video_type == 5  ? 'selected' : ''}}>{{__('Label.Session')}}</option>
                        </select>
                    </div>
                </div> -->
            </div>
            <div class="form-row">
                <div class="form-group col-lg-12">
                    <label for="description">{{__('Label.Description')}}</label>
                    <textarea name="description" class="form-control" rows="5" id="description"  placeholder="{{__('Label.Hello,')}}">{{$result->description}}</textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="is_premium">{{__('Label.Is Premium')}}</label>
                        <select class="form-control" id="is_premium" name="is_premium">
                            <option value="0" {{ $result->is_premium == 0  ? 'selected' : ''}}>{{__('Label.No')}}</option>
                            <option value="1" {{ $result->is_premium == 1  ? 'selected' : ''}}>{{__('Label.Yes')}}</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="is_title">Is Title</label>
                        <select class="form-control" id="is_title" name="is_title">
                            <option value="0" {{ $result->is_title == 0  ? 'selected' : ''}}>{{__('Label.No')}}</option>
                            <option value="1" {{ $result->is_title == 1  ? 'selected' : ''}}>{{__('Label.Yes')}}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="thumbnail">{{__('Label.Thumbnail Image')}}</label>
                        <input type="file" class="form-control" id="thumbnail" name="thumbnail" value="{{$result->thumbnail}}">
                        <label class="mt-1 text-gray">{{__('Label.Note_Image')}}</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="landscape">{{__('Label.Landscape Image')}}</label>
                        <input type="file" class="form-control" id="landscape" name="landscape" value="{{$result->landscape}}">
                        <label class="mt-1 text-gray">{{__('Label.Note_Image')}}</label>
                    </div>
                </div>
            </div>
            <div class="form-row mb-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="custom-file">
                            <?php $app = Get_Image('show',$result->thumbnail);  ?>
                            @if($result->thumbnail != null)
	    						<img  src="{{$app}}" height="120px" width="120px" class="mb-3 img-thumbnail" id="preview-image-before-upload">
	    					@else
	    						<img  src="{{asset('assets/imgs/1.png')}}" height="120px" width="120px" class="mb-3 img-thumbnail" id="preview-image-before-upload">
	    					@endif
							<input type="hidden" name="old_thumbnail" value="{{$result->thumbnail}}">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="custom-file">
                            <?php $app = Get_Image('show',$result->landscape); ?>
                            @if($result->landscape != null)
	    						<img  src="{{$app}}" height="120px" width="120px" class="mb-3 img-thumbnail" id="preview-image-before-upload1">
	    					@else
	    						<img  src="{{asset('assets/imgs/1.png')}}" height="120px" width="120px" class="mb-3 img-thumbnail" id="preview-image-before-upload1">
	    					@endif
							<input type="hidden" name="old_landscape" value="{{$result->landscape}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-top mt-2 pt-3 text-right">
                <button type="button" class="btn btn-default mw-120" onclick="edit_TVShow()">{{__('Label.UPDATE')}}</button>
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
		function edit_TVShow() {
			var formData = new FormData($("#edit_TVShow")[0]);
            $("#dvloader").show();
			$.ajax({
				type: 'POST',
				url: '{{ route("TVShowUpdate") }}',
				data: formData,
				cache: false,
				contentType: false,
				processData: false,
				success: function(resp) {
                    $("#dvloader").hide();
					get_responce_message(resp, 'edit_TVShow', '{{ route("TVShow") }}');
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
                    $("#dvloader").hide();
					toastr.error(errorThrown.msg, 'failed');
				}
			});
		}
		
		$(document).ready(function() {
			$("#category_id").select2();
			$(".selectd2").select2({
				placeholder: "Select Category"
			});
		});

		$(document).ready(function() {
			$("#language_od").select2();
			$(".selectd2_1").select2({
				placeholder: "Select Language"
			});
		});

		$(document).ready(function() {
			$("#cast_id").select2();
			$(".selectd2_2").select2({
				placeholder: "Select Cast"
			});
		});
	</script>	
@endpush