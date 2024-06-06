@extends('layouts.admin')

@section('title', $project->title)

@section('content')
<section>
    <div class="d-flex justify-content-between align-items-center py-4">
        <h1>{{$project->title}}</h1>
        <div>
            <a href="{{route('admin.projects.edit', $project->slug)}}" class="btn btn-secondary">Edit</a>
                <form action="{{route('admin.projects.destroy', $project->slug)}}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-button btn btn-danger" data-item-title="{{$project->title}}">Delete project</button>
                </form>
        </div>
    </div>
    <p>{{$project->content}}</p>
    {{-- <img src="{{asset('storage/'. $project->image)}}" alt="{{$project->title}}"> --}}
    @if($project->image)
        <img src="{{asset('storage/'. $project->image)}}" alt="{{$project->title}}">
    @else
        <img src="/img/placeholder.png" alt="{{$project->title}}">
    @endif
</section>
@endSection