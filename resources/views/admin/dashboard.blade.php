@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')
    <div class="row">
        <div class="col-12 col-sm-6 col-md-4">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center text-success fs-4">
                        Published Projects
                    </h2>
                    <h3 class="text-center fs-2">
                        {{ $projects }}
                    </h3>
                    <div class="text-center mt-4">
                        <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">
                            See All
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center text-success fs-4">
                        Types
                    </h2>
                    <h3 class="text-center fs-2">
                        {{ $types }}
                    </h3>
                    <div class="text-center mt-4">
                        <a href="{{ route('admin.types.index') }}" class="btn btn-primary">
                            See All
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center text-success fs-4">
                        Technologies
                    </h2>
                    <h3 class="text-center fs-2">
                        {{ $technologies }}
                    </h3>
                    <div class="text-center mt-4">
                        <a href="{{ route('admin.technologies.index') }}" class="btn btn-primary">
                            See All
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection