@extends('layouts.admin')

@section('title', 'Edit technology', $technology->title) 

@section('content')
    <section class="text-white">

        <div class="container">
            <div class="d-flex justify-content-between align-items-center py-4">
                <div >
                    <a href="{{ route('admin.technologies.index') }}" class="btn ls-glass-badge px-4" ><i class="fa-solid fa-arrow-left text-white"></i></a>
                </div>
                <h2>Edit technology: {{$technology->title}}</h2>
                <a href="{{route('admin.technologies.show', $technology->slug)}}" class="btn btn-danger">Show technology</a>
            </div>
        </div>
           
            <div class="container ls-glass mt-2">
    
            <form action="{{route('admin.technologies.update', $technology->slug)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
    
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title', $technology->title)}}" minlength="3" maxlength="200" required>
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div> 
                    @enderror
                    <div id="titleHelp" class="form-text">Enter the title of the technology</div>
                </div>
    
                <div class="d-flex">
                    <div class="media me-4">
                        @if($technology->image)
                            <img src="{{asset('storage/'. $technology->image)}}" class="shadow" width="150" alt="{{$technology->title}}" id="uploadPreview">
                        @else
                            <img class="shadow" width="150" src="/img/placeholder.png" alt="{{$technology->title}}" id="uploadPreview">
                        @endif
                    </div>
                </div>
    
                <div class="mb-3">
                    <input type="file" accept="image/*" class="form-control @error('image') is-invalid @enderror" name="image" id="uploadImage" value="{{old('image', $technology->image)}}" maxlength="255">
                    @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" required>
                    {{ old('content', $technology->content) }}
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