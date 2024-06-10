@extends('layouts.admin')

@section('title', 'Edit type', $type->name) 

@section('content')
    <section class="text-white">

        <div class="container">
            <div class="d-flex justify-content-between align-items-center py-4">
                <div >
                    <a href="{{ route('admin.types.index') }}" class="btn ls-glass-badge px-4" ><i class="fa-solid fa-arrow-left text-white"></i></a>
                </div>
                <h2>Edit type: {{$type->name}}</h2>
                <a href="{{route('admin.types.show', $type->slug)}}" class="btn btn-danger">Show type</a>
            </div>
        </div>
           
            <div class="container ls-glass mt-2">
    
            <form action="{{route('admin.types.update', $type->slug)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
    
                <div class="mb-3">
                    <label for="name" class="form-label">name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name', $type->name)}}" minlength="3" maxlength="200" required>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div> 
                    @enderror
                    <div id="nameHelp" class="form-text">Enter the name of the type</div>
                </div>
    
                <div class="d-flex">
                    <div class="media me-4">
                        @if($type->image)
                            <img src="{{asset('storage/'. $type->image)}}" class="shadow" width="150" alt="{{$type->name}}" id="uploadPreview">
                        @else
                            <img class="shadow" width="150" src="/img/placeholder.png" alt="{{$type->name}}" id="uploadPreview">
                        @endif
                    </div>
                </div>
    
                <div class="mb-3">
                    <input type="file" accept="image/*" class="form-control @error('image') is-invalid @enderror" name="image" id="uploadImage" value="{{old('image', $type->image)}}" maxlength="255">
                    @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                
    
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" required>
                    {{ old('content', $type->content) }}
                  </textarea>
                    @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="pb-3">
                    <button type="submit" class="btn btn-danger">Update</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </form>
        </div>
        
    </section>

@endsection