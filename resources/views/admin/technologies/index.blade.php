@extends('layouts.admin') 

@section('title', 'Technologies')

@section('content')
    <section>
      <div class="d-flex justify-content-between align-items-center py-3">
        <h1>Technologies</h1>
        <a href="{{route('admin.technologies.create')}}" class="btn btn-primary me-2"><i class="fa-solid fa-plus"></i> Add new technology</a>
      </div>
        <table class="ls-glass">
          
            <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Name</th>
                  <th scope="col">Slug</th>
                  <th scope="col">Created At</th>
                  <th scope="col">Updated At</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>

              <tbody>
                @foreach ($technologies as $technology)
                <tr>
                  <td>{{$technology->id}}</td>
                  <td>{{$technology->name}}</td>
                  <td>{{$technology->slug}}</td>
                  <td>{{$technology->created_at}}</td>
                  <td>{{$technology->updated_at}}</td>
                  <td>
                    <a href="{{route('admin.technologies.show', $technology->slug)}}">
                      <i class="fa-regular fa-eye"></i>
                    </a>
                    <a href="{{route('admin.technologies.edit', $technology->slug)}}">
                      <i class="fa-solid fa-file-pen"></i> 
                    </a>
                    <form action="{{route('admin.technologies.destroy', $technology->slug)}} method="POST" class="d-inline-block">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="delete-button" data-item-title="{{$technology->name}}" href="{{route('admin.technologies.destroy', $technology->slug)}}">
                        <i class="fa-solid fa-trash-can"></i>
                      </button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
        </table>
    </section>
@endsection