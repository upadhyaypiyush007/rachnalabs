@extends('admin.layouts.master')
@section('title', __('Label.Edit Test'))
@section('content')

    <div class="body-content">
        <h1 class="page-title-sm">@yield('title')</h1>

        <div class="border-bottom row mb-3">
            <div class="col-sm-10">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">{{ __('Label.Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('labtests.list') }}">{{ __('Label.Tests') }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('Label.Edit Test') }}
                    </li>
                </ol>
            </div>
            <div class="col-sm-2 d-flex align-items-center justify-content-end">
                <a href="{{ route('labtests.list') }}" class="btn btn-default mw-120" style="margin-top:-14px">
                    {{ __('Label.Tests') }}
                </a>
            </div>
        </div>

        <div class="card custom-border-card mt-3">
            <form enctype="multipart/form-data" id="update_test" autocomplete="off">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $test->id }}">
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="name">{{ __('Label.Test Name') }}</label>
                            <input name="name" type="text" class="form-control" id="name"
                                value="{{ $test->name }}" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="price">{{ __('Label.PriceINR') }}</label>
                            <input name="price" type="number" class="form-control" id="price"
                                value="{{ $test->price }}" autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <label for="category">{{ __('Label.Category') }}</label>
                            <input name="category" type="text" class="form-control" id="category"
                                value="{{ $test->category }}" autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="border-top pt-3 text-right">
                    <button type="button" class="btn btn-default mw-120" onclick="update_test({{ $test->id }})">
                        {{ __('Label.UPDATE') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection

@push('scripts')
    <script type="text/javascript">
        function update_test(id) {
            var formData = new FormData($("#update_test")[0]);
            $("#dvloader").show();
            $.ajax({
                type: 'POST',
                url: '/admin/labtests/' + id,
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'X-HTTP-Method-Override': 'PUT'
                },
                success: function(resp) {
                    $("#dvloader").hide();
                    toastr.success(resp.message, 'Success');
                    window.location.replace('{{ route('labtests.list') }}');
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    $("#dvloader").hide();
                    toastr.error(errorThrown.msg, 'failed');
                }
            });

        }
        
    </script>
@endpush
