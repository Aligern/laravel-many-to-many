@extends('layouts.admin')

@section('title', 'Edit project', $project->title) 

@section('content')
    <section class=" text-white">
        <div class="container ls-glass mt-2">
            <div class="d-flex justify-content-between align-items-center py-4">
                <h2>Edit project: {{$project->title}}</h2>
                <a href="{{route('admin.projects.show', $project->slug)}}" class="btn btn-danger">Show Project</a>
            </div>
    
            <form action="{{route('admin.projects.update', $project->slug)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
    
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title', $project->title)}}" minlength="3" maxlength="200" required>
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div> 
                    @enderror
                    <div id="titleHelp" class="form-text">Enter the title of the project</div>
                </div>
    
                <div class="d-flex">
                    <div class="media me-4">
                        @if($project->image)
                            <img src="{{asset('storage/'. $project->image)}}" class="shadow" width="150" alt="{{$project->title}}" id="uploadPreview">
                        @else
                            <img class="shadow" width="150" src="/img/placeholder.png" alt="{{$project->title}}" id="uploadPreview">
                        @endif
                    </div>
                </div>
    
                <div class="mb-3">
                    <input type="file" accept="image/*" class="form-control @error('image') is-invalid @enderror" name="image" id="uploadImage" value="{{old('image', $project->image)}}" maxlength="255">
                    @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                
    
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" required>
                    {{ old('content', $project->content) }}
                  </textarea>
                    @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <p>Select a technology</p>
                    @foreach ($technologies as $technology)
                        <div>
                            <input type="checkbox" name="technologies[]" value="{{$technology->id}}" class="form-check-input" {{$project->technologies->contains($technology->id) ? 'checked' : ''}}>
                            <label for="" class="form-check-label">{{$technology->name}}</label>
                        </div>
                    @endforeach
                    @error('technologies')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="mb-3">
                    <button type="submit" class="btn btn-danger">Update</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </form>
        </div>
        
    </section>

@endsection