@extends('layouts.admin')

@section('title', $technology->name)

@section('content')
<section>
    <div class="d-flex justify-content-between align-items-center py-4">
        <h1>{{$technology->name}}</h1>
        <div>
            <a href="{{route('admin.thechnologies.edit', $technology->slug)}}" class="btn btn-secondary">Edit</a>
                <form action="{{route('admin.thechnologies.destroy', $technology->slug)}}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-button btn btn-danger" data-item-title="{{$technology->title}}">Delete technology</button>
                </form>
        </div>
    </div>
    <p>{{$technology->content}}</p>
    {{-- <img src="{{asset('storage/'. $technology->image)}}" alt="{{$technology->title}}"> --}}
    @if($technology->image)
        <img src="{{asset('storage/'. $technology->image)}}" alt="{{$technology->name}}">
    @else
        <img src="/img/placeholder.png" alt="{{$technology->name}}">
    @endif
</section>
@endSection