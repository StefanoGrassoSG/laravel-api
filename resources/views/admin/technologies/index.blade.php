@extends('layouts.app')

@section('page-title', 'Technologies table')

@section('main-content')
    <div class="row d-flex">
        <div class="col">
            <a href="{{ route('admin.technologies.create')}}" class="btn btn-success mb-3">
                +Add New Technology
            </a>
            <table class="table table-dark table-striped">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Slug</th>
                    <th scope="col" class="mini-col text-center">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($technologies as $technology)
                        <tr>
                            <td>
                                {{ $technology->id }}
                            </td>
                            <td>
                                {{ $technology->name }}
                            </td>
                            <td>
                                {{ $technology->slug }}
                            </td>
                            <td class="small-td"> 
                                <a href="{{ route('admin.technologies.show', ['technology' => $technology->id]) }}" class="w-100 btn btn-primary">
                                    View
                                </a>
                                <a href="{{ route('admin.technologies.edit', ['technology' => $technology->id]) }}" class="w-100 btn btn-warning my-2">
                                    Edit
                                </a>
                                <form class="w-100" action="{{ route('admin.technologies.destroy', ['technology' => $technology->id]) }}" method="post" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="w-100 btn btn-danger">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection