@extends('layouts.admin')

@section('title', $project->title)

@section('content')
<section class=" text-white">
    <div class="container mt-3 ">
        <a href="{{ route('admin.projects.index') }}" class="btn ls-glass-badge px-4"><i class="fa-solid fa-arrow-left text-white"></i></a>
    </div>
    <div class="container ls-glass mt-2 pb-2">
        <div class="text-center py-4">
            <h1>{{$project->title}}</h1>
        </div>
        
        <div class="mt-3 text-center">

            <div>
                <p>{{$project->content}}</p>
                {{-- <img src="{{asset('storage/'. $project->image)}}" alt="{{$project->title}}"> --}}
                @if($project->image)
                    <img src="{{asset('storage/'. $project->image)}}" width="200" alt="{{$project->title}}">
                @else
                    <img src="/img/placeholder.png" width="200" alt="{{$project->title}}">
                @endif
            </div>

            <div>
                @if($project->type)
                    <div class="mt-3">
                        <span class="fs-4 d-block">Project Typology</span>
                        <span class="badge ls-glass-badge">{{$project->type->name}}</span class="badge ls-glass-badge">
                    </div>
                @endif
            </div>

            <div>
                @if($project->technologies)
                    <ul>
                        <span class="fs-4 d-block">Technologies used</span>
                            @foreach($project->technologies as $technology)
                                <span class="badge ls-glass-badge">{{$technology->name}}</span>
                            @endforeach
                    </ul>
                @endif
            </div>
        <div class="mt-3 mb-4">
            <a href="{{route('admin.projects.edit', $project->slug)}}" class="btn btn-secondary">Edit</a>
                <form action="{{route('admin.projects.destroy', $project->slug)}}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-button btn btn-danger" data-item-title="{{$project->title}}">Delete project</button>
                </form>
        </div>
    </div>
        </div>
    
    
</section>
@endSection