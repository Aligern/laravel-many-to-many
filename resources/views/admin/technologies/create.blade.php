@extends('layouts.admin')

@section('title', 'Add new technology')

@section('content')

<section class="text-white">
    <div class="container mt-3">
        <a href="{{ route('admin.technologies.index') }}" class="btn ls-glass-badge"><i class="fa-solid fa-arrow-left text-white"></i></a>
    </div>
    <div class="container ls-glass mt-2">
        <h2>Create a new technology</h2>

    <form action="{{route('admin.technologies.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">technology name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}" minlength="3" maxlength="200" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div> 
            @enderror
            <div id="nameHelp" class="form-text">Enter the name of the technology</div>
        </div>

        <div class="mb-3">
            <img id="uploadPreview" width="100" src="/img/placeholder.png">
            <input type="file" accept="image/*" class="form-control @error('image') is-invalid @enderror" id="uploadImage" name="image" value="{{old('image')}}" maxlength="255">
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" required>
                    {{ old('content') }}
                </textarea>
                @error('content')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            
              <div class="form-group mb-3">
                <p>Select a technology</p>
                @foreach ($technologies as $technology)
                    <div>
                        <input type="checkbox" name="technologies[]" value="{{$technology->id}}" class="form-check-input" {{in_array($technology->id, old('technologies', [])) ? 'checked' : ''}}">
                        <label for="" class="form-check-label">{{$technology->name}}</label>
                    </div>
                @endforeach
                @error('technologies')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-danger">Create</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>

    </form>
    </div>
    
</section>
@endsection