@extends('layouts.app')

@section('page-title', $type->name)

@section('main-content')
    <div class="row">
        <div class="col">
            <h2 class="fw-bold">
                Your Type
            </h2>

            <div class="card w-50 p-3 bg-dark text-light fs-5">
                <div class="mb-1">
                   <span class="fw-bold">ID:</span> <span>{{ $type->id }}</span>
                </div>
                <div class="mb-1">
                    <span class="fw-bold">NAME:</span> <span>{{ $type->name }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col">
            <h2 class="fw-bold">
                Linked Projects
            </h2>

            @foreach ($type->projects as $project)
                <div class="card w-50 p-3 bg-dark text-light fs-5 mb-3">
                    <div class="mb-1">
                    <span class="fw-bold">ID:</span> <span>{{ $project->id }}</span>
                    </div>
                    <div class="mb-1">
                        <span class="fw-bold">NAME:</span> <a href="{{ route('admin.projects.show', ['project'=> $project->id]) }}">{{ $project->name }}</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection