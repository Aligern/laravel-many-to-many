@extends('layouts.admin')

@section('title', $technology->name)

@section('content')
    <section class=" text-white">
        <div class="container mt-3 ">
            <a href="{{ route('admin.technologies.index') }}" class="btn ls-glass-badge px-4"><i
                    class="fa-solid fa-arrow-left text-white"></i></a>
        </div>
        <div class="container ls-glass mt-2 pb-2">
            <div class="text-center py-4">
                <h1>{{ $technology->name }}</h1>
            </div>

            <table>
                <thead>
                    <tr>
                        <th scope="col">
                            Id
                        </th>
                        <th scope="col">
                            Name
                        </th>
                        <th scope="col">
                            Slug
                        </th>
                        <th scope="col">
                            Created At
                        </th>
                        <th scope="col">
                            Updated At
                        </th>
                        <th scope="col">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($technology->projects as $project)
                    <tr>
                        <td>{{$project->id}}</td>
                        <td>{{$project->title}}</td>
                        <td>{{$project->slug}}</td>
                        <td>{{$project->created_at}}</td>
                        <td>{{$project->updated_at}}</td>
                        <td class="d-flex">
                            <a class="m-1 btn text-white" href="{{route('admin.projects.show', $project->slug)}}">
                                <i class="fa-regular fa-eye"></i>
                            </a>
                            <a class="m-1 btn text-white" href="{{route('admin.projects.edit', $project->slug)}}">
                                <i class="fa-solid fa-file-pen"></i> 
                            </a>
                            <form action="{{route('admin.projects.destroy', $project->slug)}}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn m-1 text-danger" href="{{route('admin.projects.destroy', $project->slug)}}">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </table>
            <div class="mt-3 text-center">
                <div class="mt-3 mb-4">
                    <a href="{{ route('admin.technologies.edit', $technology->slug) }}" class="btn btn-secondary">Edit</a>
                    <form action="{{ route('admin.technologies.destroy', $technology->slug) }}" method="POST"
                        class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button btn btn-danger"
                            data-item-title="{{ $technology->name }}">Delete technology</button>
                    </form>
                </div>

            </div>
        </div>




    </section>
@endSection
