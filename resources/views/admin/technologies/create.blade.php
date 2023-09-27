@extends('layouts.app')

@section('page-title', 'Technologies table')

@section('main-content')
    <div class="row">
        <div class="col">
            <h2 class="fw-bold">
                Insert New Technology Data
            </h2>
            <form action="{{ route('admin.technologies.store') }}" method="POST" class="bg-info-subtle p-5 border border-primary-subtle mt-5 mb-3">
                @csrf
                <div class="w-50 me-2">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="name" id="floatingInput" value="{{ old('name') }}">
                        <label for="floatingInput">Name<span class="text-danger">*</span></label>
                        @error('name')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-success mt-3">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection