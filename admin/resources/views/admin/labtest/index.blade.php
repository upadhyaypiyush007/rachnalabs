@extends('admin.layouts.master')
@section('title', __('Label.Tests'))
@section('content')

    <div class="body-content">
        <h1 class="page-title-sm">@yield('title')</h1>

        <div class="border-bottom row mb-3">
            <div class="col-sm-10">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">{{ __('Label.Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('Label.Tests') }}
                    </li>
                </ol>
            </div>
            <div class="col-sm-2 d-flex align-items-center justify-content-end">
                <a href="{{ route('labtests.create') }}" class="btn btn-default mw-120" style="margin-top:-14px">
                    {{ __('Label.Add Test') }}
                </a>
            </div>
        </div>

        <div class="card custom-border-card mt-3">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('Label.Test Name') }}</th>
                            <th>{{ __('Label.Price') }}</th>
                            <th>{{ __('Label.Category') }}</th>
                            <th>{{ __('Label.Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tests as $key => $test)
                            <tr>
                                <td>{{ $tests->firstItem() + $key }}</td>
                                <td>{{ $test->name }}</td>
                                <td>{{ $test->price }}</td>
                                <td>{{ $test->category }}</td>
                                <td>
                                    <a href="{{ route('labtests.edit', $test->id) }}" class="btn btn-sm btn-primary me-1"
                                        style="background: blue">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>

                                    <form action="{{ route('labtests.destroy', $test->id) }}" method="POST"
                                        style="display:inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" style="background: red"
                                            onclick="return confirm('Are you sure?')">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                  <div class="d-flex justify-content-end mt-3">
                      {{ $tests->links() }}
                  </div>
            </div>
        </div>
    </div>

@endsection
