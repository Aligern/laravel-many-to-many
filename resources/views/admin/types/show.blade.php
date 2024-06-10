@extends('layouts.admin')

@section('title', $type->name)

@section('content')
<section class=" text-white">
    <div class="container mt-3 ">
        <a href="{{ route('admin.types.index') }}" class="btn ls-glass-badge px-4"><i class="fa-solid fa-arrow-left text-white"></i></a>
    </div>
    <div class="container ls-glass mt-2 pb-2">
        <div class="text-center py-4">
            <h1>{{$type->name}}</h1>
        </div>
        
        <div class="mt-3 text-center">

            <div>
                <p>{{$type->content}}</p>
                {{-- <img src="{{asset('storage/'. $type->image)}}" alt="{{$type->name}}"> --}}
                @if($type->image)
                    <img src="{{asset('storage/'. $type->image)}}" width="200" alt="{{$type->name}}">
                @else
                    <img src="/img/placeholder.png" width="200" alt="{{$type->name}}">
                @endif
            </div>

            <div>
                @if($type->type)
                    <div class="mt-3">
                        <span class="fs-4 d-block">type Typology</span>
                        <span class="badge ls-glass-badge">{{$type->type->name}}</span class="badge ls-glass-badge">
                    </div>
                @endif
            </div>

            <div>
                @if($type->technologies)
                    <ul>
                        <span class="fs-4 d-block">Technologies used</span>
                            @foreach($type->technologies as $technology)
                                <span class="badge ls-glass-badge">{{$technology->name}}</span>
                            @endforeach
                    </ul>
                @endif
            </div>
        <div class="mt-3 mb-4">
            <a href="{{route('admin.types.edit', $type->slug)}}" class="btn btn-secondary">Edit</a>
                <form action="{{route('admin.types.destroy', $type->slug)}}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-button btn btn-danger" data-item-title="{{$type->name}}">Delete type</button>
                </form>
        </div>
    </div>
        </div>
    
    
</section>
@endSection