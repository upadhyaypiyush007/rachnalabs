@extends('admin.layouts.master')
@section('title', __('Label.Edit Laboratory'))
@section('content')

<div class="body-content">
    <h1 class="page-title-sm">@yield('title')</h1>

    <div class="border-bottom row mb-3">
        <div class="col-sm-10">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Label.Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.laboratories.index') }}">{{ __('Label.Laboratories') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Label.Edit') }}</li>
            </ol>
        </div>
    </div>

    <form action="{{ route('admin.laboratories.update', $laboratory->id) }}" method="POST">
        @csrf        
        <div class="row mb-3">
            <div class="col-md-6">
                <label>{{ __('Label.Name') }}</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $laboratory->name) }}" required>
            </div>
            <div class="col-md-6">
                <label>{{ __('Label.Address') }}</label>
                <input type="text" name="address" class="form-control" value="{{ old('address', $laboratory->address) }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label>{{ __('Label.Cast') }}</label>
                <select id="cast" name="cast_id" class="form-control">
                    <option value="">Select Cast</option>
                    @foreach($casts as $cast)
                        <option value="{{ $cast->id }}" {{ $laboratory->cast_id == $cast->id ? 'selected' : '' }}>
                            {{ $cast->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label>{{ __('Label.Package') }}</label>
                <select id="package" name="package_id" class="form-control">
                    <option value="">Select Package</option>
                    @foreach($packages as $package)
                        <option value="{{ $package->id }}" {{ $laboratory->package_id == $package->id ? 'selected' : '' }}>
                            {{ $package->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label>{{ __('Label.Test') }}</label>
                <select id="test" name="test_id" class="form-control">
                    <option value="">Select Test</option>
                    @foreach($tests as $test)
                        <option value="{{ $test->id }}" {{ $laboratory->test_id == $test->id ? 'selected' : '' }}>
                            {{ $test->name }}
                        </option>
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
                        <option value="{{ $user->id }}" {{ $laboratory->user_id == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label>{{ __('Label.Status') }}</label>
                <select name="status" class="form-control" required>
                    <option value="1" {{ $laboratory->status == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ $laboratory->status == 0 ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-success">{{ __('Label.Update') }}</button>
    </form>
</div>

@endsection

@push('scripts')
<script>
    function toggleOptions() {
        let cast = $('#cast').val();
        let packageVal = $('#package').val();
        let testVal = $('#test').val();

        if (cast || packageVal || testVal) {
            if(!cast) $('#cast').prop('disabled', true);
            if(!packageVal) $('#package').prop('disabled', true);
            if(!testVal) $('#test').prop('disabled', true);
        } else {
            $('#cast').prop('disabled', false);
            $('#package').prop('disabled', false);
            $('#test').prop('disabled', false);
        }
    }

    $(document).ready(function() {
        toggleOptions();
        $('#cast, #package, #test').change(function() {
            toggleOptions();
        });
    });
</script>
@endpush
