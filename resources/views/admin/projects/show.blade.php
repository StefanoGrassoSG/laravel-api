@extends('layouts.app')

@section('page-title', $project->name)

@section('main-content')
    <div class="row">
        <div class="col">
            <h2 class="fw-bold">
                Your Project
            </h2>

            <div class="card w-50 p-3 bg-dark text-light fs-5">
                <div class="mb-1">
                   <span class="fw-bold">ID:</span> <span>{{ $project->id }}</span>
                </div>
                <div class="mb-1">
                    <span class="fw-bold">NAME:</span> <span>{{ $project->name }}</span>
                </div>
                <div class="mb-1">
                    <span class="fw-bold">TYPE:</span> 
                    @if ($project->type)
                        <a href="{{ route('admin.types.show', ['type' => $project->type->id]) }}">{{ $project->type->name }}</a>
                    @else
                    -
                    @endif
                </div>
                <div class="mb-1">
                    <span class="fw-bold">DESCRIPTION:</span> <span>{{ $project->description }}</span>
                </div>
                <div class="mb-1">
                    <span class="fw-bold">START DATE:</span> <span>{{ $project->start_date }}</span>
                </div>
                <div class="mb-1">
                    <span class="fw-bold">END DATE:</span> <span>{{ $project->end_date }}</span>
                </div>
                <div class="mb-1">
                    <span class="fw-bold">PROJECT STATUS:</span> <span>{{ $project->project_status }}</span>
                </div>
                <div class="mb-1">
                    <span class="fw-bold">TECHNOLOGIES:</span> 
                    @if ($project->technologies->isEmpty())
                    -
                    @else
                    @foreach ($project->technologies as $technology)
                        <span class="badge rounded-pill text-bg-primary">
                            {{ $technology->name }}
                        </span>
                    @endforeach
                @endif
                </div>
                <div class="mb-1">
                    <span class="fw-bold">PROJECT LINK:</span> <span><a href="{{ $project->project_link  }}">{{ $project->project_link }}</a></span>
                </div>
            </div>
        </div>
    </div>
@endsection