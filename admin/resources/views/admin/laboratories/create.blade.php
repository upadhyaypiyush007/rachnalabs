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

    <form action="{{ route('admin.laboratories.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6">
                <label>{{ __('Label.Name') }}</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>
            <div class="col-md-6">
                <label>{{ __('Label.Address') }}</label>
                <input type="text" name="address" class="form-control" value="{{ old('address') }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label>{{ __('Label.Cast') }}</label>
                <select name="cast_id" class="form-control" required>
                    <option value="">Select Doctor</option>
                    @foreach($casts as $cast)
                        <option value="{{ $cast->id }}">{{ $cast->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label>{{ __('Label.Package') }}</label>
                <select name="package_id" class="form-control">
                    <option value="">Select Package</option>
                    @foreach($packages as $package)
                        <option value="{{ $package->id }}">{{ $package->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label>{{ __('Label.Test') }}</label>
                <select name="test_id" class="form-control">
                    <option value="">Select Test</option>
                    @foreach($tests as $test)
                        <option value="{{ $test->id }}">{{ $test->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label>{{ __('Label.User') }}</label>
                <select name="user_id" class="form-control" required>
                    <option value="">Select User</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label>{{ __('Label.Status') }}</label>
                <select name="status" class="form-control" required>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-success">{{ __('Label.Save') }}</button>
    </form>
</div>
@push('scripts')
<script>
$(document).ready(function() {
    function toggleOptions() {
        var cast = $('select[name="cast_id"]').val();
        var package = $('select[name="package_id"]').val();
        var test = $('select[name="test_id"]').val();

        if(cast || package || test) {
            if(!cast) $('select[name="cast_id"]').prop('disabled', false); else $('select[name="cast_id"]').prop('disabled', false);
            if(!package) $('select[name="package_id"]').prop('disabled', !!(cast || test)); 
            if(!test) $('select[name="test_id"]').prop('disabled', !!(cast || package));
            
            if(cast) { $('select[name="package_id"], select[name="test_id"]').prop('disabled', true); }
            if(package) { $('select[name="cast_id"], select[name="test_id"]').prop('disabled', true); }
            if(test) { $('select[name="cast_id"], select[name="package_id"]').prop('disabled', true); }
        } else {
            $('select[name="cast_id"], select[name="package_id"], select[name="test_id"]').prop('disabled', false);
        }
    }

    $('select[name="cast_id"], select[name="package_id"], select[name="test_id"]').on('change', toggleOptions);

    toggleOptions();
});
</script>
@endpush

@endsection
