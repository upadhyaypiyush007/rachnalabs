@extends('admin.layouts.master')
@section('title', __('Label.Create Laboratory'))
@section('content')
<div class="body-content">
    <h1 class="page-title-sm">@yield('title')</h1>
    <div class="border-bottom row mb-3">
        <div class="col-sm-10">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Label.Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.laboratories.index') }}">{{ __('Label.Laboratories') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Label.Create') }}</li>
            </ol>
        </div>
    </div>
    <form id="laboratoryForm" action="{{ route('admin.laboratories.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6">
                <label>{{ __('Label.Name') }}</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            </div>
            <div class="col-md-6">
                <label>{{ __('Label.Address') }}</label>
                <input type="text" name="address" class="form-control" value="{{ old('address') }}">
            </div>
        </div>
        <div class="row mb-3">
            <!-- Multiple Doctors -->
            <div class="col-md-4">
                <label>{{ __('Label.Doctors') }}</label>
                <select name="cast_id[]" class="form-control select2-multiple" multiple="multiple">
                    @foreach ($casts as $doctor)
                        <option value="{{ $doctor->id }}" {{ collect(old('cast_id'))->contains($doctor->id) ? 'selected' : '' }}>
                            {{ $doctor->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <!-- Multiple Packages -->
            <div class="col-md-4">
                <label>{{ __('Label.Package') }}</label>
                <select name="package_id[]" class="form-control select2-multiple" multiple="multiple">
                    @foreach ($packages as $package)
                        <option value="{{ $package->id }}" {{ collect(old('package_id'))->contains($package->id) ? 'selected' : '' }}>
                            {{ $package->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <!-- Multiple Tests -->
            <div class="col-md-4">
                <label>{{ __('Label.Test') }}</label>
                <select name="test_id[]" class="form-control select2-multiple" multiple="multiple">
                    @foreach ($tests as $test)
                        <option value="{{ $test->id }}" {{ collect(old('test_id'))->contains($test->id) ? 'selected' : '' }}>
                            {{ $test->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label>{{ __('Label.Status') }}</label>
                <select name="status" class="form-control">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-success">{{ __('Label.Save') }}</button>
    </form>
</div>

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

<script>
$(document).ready(function() {
    // Select2 initialization
    $('select[name="cast_id[]"], select[name="package_id[]"], select[name="test_id[]"]').select2({
        placeholder: "Select options",
        allowClear: true,
        width: '100%'
    });

    // jQuery Validation
    $("#laboratoryForm").validate({
        rules: {
            name: {
                required: true,
                maxlength: 255
            },
            address: {
                required: true,
                maxlength: 255
            },
            'cast_id[]': {
                required: true
            },
            'package_id[]': {
                required: true
            },
            'test_id[]': {
                required: true
            },
            status: {
                required: true
            }
        },
        messages: {
            name: "Please enter laboratory name",
            address: "Please enter laboratory address",
            'cast_id[]': "Please select at least one doctor",
            'package_id[]': "Please select at least one package",
            'test_id[]': "Please select at least one test",
            status: "Please select status"
        },
        errorElement: 'span',
        errorClass: 'text-danger',
        highlight: function(element) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element) {
            $(element).removeClass('is-invalid');
        }
    });
});
</script>
@endpush
@endsection
