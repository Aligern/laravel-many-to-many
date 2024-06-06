@extends('layouts.admin')

@section('title', $type->name)

@section('content')
<section>
    <div class="d-flex justify-content-between align-items-center py-4">
        <h1>{{$type->name}}</h1>
        <div>
            <a href="{{route('admin.types.edit', $type->slug)}}" class="btn btn-secondary">Edit</a>
                <form action="{{route('admin.types.destroy', $type->slug)}}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-button btn btn-danger" data-item-title="{{$type->name}}">Delete type</button>
                </form>
        </div>
    </div>
    <p>{{$type->content}}</p>
    {{-- <img src="{{asset('storage/'. $type->image)}}" alt="{{$type->name}}"> --}}
    @if($type->image)
        <img src="{{asset('storage/'. $type->image)}}" alt="{{$type->name}}">
    @else
        <img src="/img/placeholder.png" alt="{{$type->name}}">
    @endif
</section>
@endSection