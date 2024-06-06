@extends('layouts.admin') 

@section('title', 'Projects')

@section('content')
    <section class="text-white">
      <div class="container d-flex justify-content-between align-items-center py-3">
        <h1>Projects</h1>
        <a href="{{route('admin.projects.create')}}" class="btn btn-primary me-2"><i class="fa-solid fa-plus"></i> Add new project</a>
      </div>
      <div class="container ls-glass p-4">
        <table>
          <thead>
              <tr class="fs-4 my-4">
                <th scope="col">Id</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($projects as $project)
              <tr>
                <td>{{$project->id}}</td>
                <td>{{$project->title}}</td>
                <td>{{$project->slug}}</td>
                <td>{{$project->created_at}}</td>
                <td>{{$project->updated_at}}</td>
                <td>
                  <a href="{{route('admin.projects.show', $project->slug)}}">
                    <i class="fa-regular fa-eye"></i>
                  </a>
                  <a href="{{route('admin.projects.edit', $project->slug)}}">
                    <i class="fa-solid fa-file-pen"></i> 
                  </a>
                  <form action="{{route('admin.projects.destroy', $project->slug)}} method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-button" href="{{route('admin.projects.destroy', $project->slug)}}">
                      <i class="fa-solid fa-trash-can"></i>
                    </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
      </table>
      </div>
        
    </section>
@endsection