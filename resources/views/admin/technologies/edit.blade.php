@extends('layouts.app')

@section('page-title', $technology->name)

@section('main-content')
    <div class="row">
        <div class="col">
            <h2 class="fw-bold">
                Edit Your Technology
            </h2>
            <form action="{{ route('admin.technologies.update', ['technology' => $technology->id]) }}" method="POST" class="d-flex justify-content-center mt-5 mb-3">
                @csrf
                @method('PUT')

                <div class="w-50 me-2">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="name" id="floatingInput" value="{{ old('name', $technology->name) }}">
                        <label for="floatingInput">Name<span class="text-danger">*</span></label>
                        @error('name')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>
                    <div>
                        <button type="submit" class="btn btn-warning mt-3">
                            Edit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection