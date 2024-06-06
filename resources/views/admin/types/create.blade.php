@extends('layouts.admin')

@section('title', 'Add new project')

@section('content')

<section>
    <h2>Create a new project</h2>

    <form action="{{route('admin.projects.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Project Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title')}}" minlength="3" maxlength="200" required>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div> 
            @enderror
            <div id="titleHelp" class="form-text">Enter the title of the project</div>
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

            <div class="mb-3">
                <button type="submit" class="btn btn-danger">Create</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>

    </form>
</section>
@endsection