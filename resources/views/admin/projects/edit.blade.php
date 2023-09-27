@extends('layouts.app')

@section('page-title', $project->name)

@section('main-content')
    <div class="row">
        <div class="col">
            <h2 class="fw-bold">
                Edit Your Project
            </h2>
            <form action="{{ route('admin.projects.update', ['project' => $project->id]) }}" method="POST" class="d-flex justify-content-center border p-5 border-primary-subtle bg-info-subtle mt-5 mb-3">
                @csrf
                @method('PUT')

                <div class="w-50 me-2">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="name" id="floatingInput" value="{{ old('name', $project->name) }}">
                        <label for="floatingInput">Name<span class="text-danger">*</span></label>
                        @error('name')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>
                      <div class="form-floating">
                        <input type="text" class="form-control" name="description" id="floatingInput" value="{{ old('name', $project->description) }}">
                        <label for="floatingInput">Description<span class="text-danger">*</span></label>
                        @error('description')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <input type="date" class="form-control" name="start_date" id="floatingInput" value="{{ old('name', $project->start_date) }}">
                        <label for="floatingInput">Start Date<span class="text-danger">*</span></label>
                        @error('start_date')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>
                      <div class="form-floating">
                        <input type="date" class="form-control" name="end_date" id="floatingInput" value="{{ old('name', $project->end_date) }}">
                        <label for="floatingInput">End Date</label>
                        @error('end_date')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <label class="form-label d-block fw-bold fs-3">Technologies</label>
                        @foreach ($technologies as $technology)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="technologies[]" id="{{ $technology->id }}" value="{{ $technology->id }}"
                                @if($errors->any())
                                    @if (in_array($technology->id, old('technologies', [])))
                                        checked
                                    @endif
                                @elseif($project->technologies->contains($technology))
                                    checked
                                @endif
                                >
                                <label class="form-check-label" for="{{ $technology->id }}">{{ $technology->name }}</label>
                            </div>
                        @endforeach 
                        @error('technologies[]')
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
                <div class="w-50 ms-2">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="project_status" id="floatingInput" value="{{ old('name', $project->project_status) }}">
                        <label for="floatingInput">Project Status<span class="text-danger">*</span></label>
                        @error('project_status')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mt-3">
                        <input type="text" class="form-control" name="project_link" id="floatingInput" value="{{ old('name', $project->project_link) }}">
                        <label for="floatingInput">Project Link<span class="text-danger">*</span></label>
                        @error('project_link')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mt-3">
                        <select class="form-select" id="floatingSelect" name="type_id" aria-label="Floating label select example">
                          <option>Select a Type</option>
                          @foreach ($types as $type)
                              <option value="{{ $type->id }}"
                                @if(old('type_id', $project->type_id) == $type->id)
                                    selected
                                @endif>{{ $type->name }}
                              </option>
                          @endforeach
                        </select>
                        <label for="floatingSelect">Type</label>
                        @error('type_id')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection