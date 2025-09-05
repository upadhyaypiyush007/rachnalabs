@extends('admin.layouts.master')
@section('title', 'Event')
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
                    <a href="{{ route('video') }}">Events</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Add Events
                </li>
            </ol>
        </div>
        <div class="col-sm-2 d-flex align-items-center justify-content-end">
      
        </div>
    </div>

    <div class="card custom-border-card mt-3">
        <form enctype="multipart/form-data" id="save_video" autocomplete="off">
            @csrf
            <input name="release_year" type="hidden" class="form-control" id="release_year">
            <input name="imdb_rating" type="hidden" class="form-control" id="imdb_rating">
            <div class="custom-border-card">
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <label for="name">{{__('Label.Name')}}</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Your Name">
                            <datalist id="Imdb_name_list"></datalist>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label>Date</label>
                            <input name="release_year" type="date" class="form-control" id="release_year">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="video_duration">Time</label>
                            <input name="video_duration" type="time" step="1" class="form-control without_ampm" id="video_duration" value="00:00:00">
                        </div>
                    </div>
                    
                </div>
                 <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="thumbnail">{{__('Label.Thumbnail Image')}}</label>
                            <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                            <input type="hidden" class="form-control" id="thumbnail_imdb" name="thumbnail_imdb">
                            <label class="mt-1 text-gray">{{__('Label.Note_Image')}}</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="landscape">{{__('Label.Landscape Image')}}</label>
                            <input type="file" class="form-control" id="landscape" name="landscape">
                            <input type="hidden" class="form-control" id="landscape_imdb" name="landscape_imdb">
                            <label class="mt-1 text-gray">{{__('Label.Note_Image')}}</label>
                        </div>
                    </div>
                </div>
               
            </div>
           
             <div class="custom-border-card">
              
                
                 <div class="form-row">
                    <div class="form-group col-lg-12">
                        <label for="description">{{__('Label.Description')}}</label>
                        <textarea name="description" class="form-control" rows="3" id="description" placeholder="{{__('Label.Hello,')}}"></textarea>
                    </div>
                </div>
            </div>
          
            <div class="border-top mt-2 pt-3 text-right">
                <button type="button" class="btn btn-default mw-120" onclick="save_video()">{{__('Label.SAVE')}}</button>
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
		function save_video() {
			var formData = new FormData($("#save_video")[0]);

            $("#dvloader").show();
			$.ajax({
				type: 'POST',
				url: '{{ route("videoSave") }}',
				data: formData,
				cache: false,
				contentType: false,
				processData: false,
				success: function(resp) {
                    $("#dvloader").hide();
					get_responce_message(resp, 'save_video', '{{ route("video") }}');
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
				placeholder: "{{__('Label.Select Category')}}"
			});

            $("#language_od").select2();
            $(".selectd2_1").select2({
                placeholder: "{{__('Label.Select Language')}}"
            });

            $("#cast_id").select2();
            $(".selectd2_2").select2({
                placeholder: "{{__('Label.Select Cast')}}"
            });

            $(".url_box").hide();
            $('#video_upload_type').change(function() {
                var optionValue = $(this).val();

                if (optionValue == 'server_video') {
                    $(".video_box").show();
                    $(".url_box").hide();
                } else {
                    $(".url_box").show();
                    $(".video_box").hide();
                }

                if (optionValue == 'server_video' || optionValue == 'external') {
                    $(".Is_Download").show();
                } else {
                    $(".Is_Download").hide();
                }
            });

            $(".subtitle_url_box").hide();
            $('#subtitle_type').change(function() {
                var optionValue = $(this).val();
    
                if (optionValue == 'server_file') {
                    $(".subtitle_box").show();
                    $(".subtitle_url_box").hide();
                } else {
                    $(".subtitle_url_box").show();
                    $(".subtitle_box").hide();
                }
            });
		});

        $('#Imdb_name').keyup(function() {
            var txtVal = this.value;

            if(txtVal.length >= 3){
                var url = "{{route('SerachName', '')}}"+"/"+txtVal;
                $.ajax({
                	type: "POST",
                	url: url,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                	data: txtVal,
                	success: function(resp) {
                        // console.log(resp.data.Response);
                        if(resp.data.Response = "True"){
                            // console.log(resp.data.Search); 
                            var Title_Data = resp.data.Search;
                            // console.log(Title_Data.length);
                            
                            $('#Imdb_name_list').empty();
                            for (let i = 0; i < Title_Data.length; i++) {
                                // console.log(Title_Data[i].Title);
                                $('#Imdb_name_list').append('<option id="'+ resp.data.Search[i].imdbID +'" value="' + resp.data.Search[i].Title + '"></option>');                              
                            }
                        }
                	},
                	error: function(XMLHttpRequest, textStatus, errorThrown) {
                		toastr.error(errorThrown.msg, 'failed');
                	}
                });
            }
        });

        $('#Imdb_name').on('input', function() {
            var userText = $(this).val();

            $("#Imdb_name_list").find("option").each(function() {
                if ($(this).val() == userText) {

                    var CompanyName=$("#Imdb_name").val();
                    c_id= $('#Imdb_name_list').find('option[value="' +CompanyName + '"]').attr('id');

                    $("#dvloader").show();
                    var url = "{{route('GetData', '')}}"+"/"+c_id;
                    $.ajax({
                        type: "POST",
                        url: url,
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: c_id,
                        success: function(resp) {
                            $("#dvloader").hide();

                            var C_Id = resp.C_Id;
                            var L_Id = resp.L_Id;
                            var C_Insert_Data = resp.C_Insert_Data;
                            var L_Insert_Data = resp.L_Insert_Data;
                            var Poster_img = resp.Poster_img;
                            var Description = resp.Description;
                            var Cast_Id = resp.Cast_Id;
                            var Cast_Insert_Data = resp.Cast_Insert_Data;
                            var Duration = resp.Duration;
                            var Year = resp.Year;
                            var imdbRating = resp.imdbRating;

                            // Append New Category
                            for (let i = 0; i < C_Insert_Data.length; i++) {
                                var data = '<option value="' + C_Insert_Data[i].id + '">'+C_Insert_Data[i].name+'</option>';
                                $('.selectd2').append(data);
                            }
                            $(".selectd2").val(C_Id).trigger("change");

                            // Append New Language
                            for (let i = 0; i < L_Insert_Data.length; i++) {
                                var data = '<option value="' + L_Insert_Data[i].id + '">'+L_Insert_Data[i].name+'</option>';
                                $('.selectd2_1').append(data);
                            }
                            $(".selectd2_1").val(L_Id).trigger("change");

                            // Append New Cast
                            for (let i = 0; i < Cast_Insert_Data.length; i++) {
                                var data = '<option value="' + Cast_Insert_Data[i].id + '">'+Cast_Insert_Data[i].name+'</option>';
                                $('.selectd2_2').append(data);
                            }
                            $(".selectd2_2").val(Cast_Id).trigger("change");

                            // Image 
                            $('#preview-image-before-upload').attr('src', Poster_img);
                            $('#preview-image-before-upload1').attr('src', Poster_img);
                            $('#thumbnail_imdb').attr('value', Poster_img);
                            $('#landscape_imdb').attr('value', Poster_img);                            

                            // Desctiption
                            $('#description').val(Description); 

                            // Duration
                            $("#video_duration").attr('value', Duration);

                            // Year
                            $("#release_year").attr('value', Year);

                            // imdb_rating
                            $("#imdb_rating").attr('value', imdbRating);

                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                            $("#dvloader").hide();
                            toastr.error(errorThrown.msg, 'failed');
                        }
                    });

                }
            })
        })
	</script>	
@endpush