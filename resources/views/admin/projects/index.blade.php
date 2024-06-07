@extends('layouts.admin') 

@section('title', 'Projects')

@section('content')
    <section class="text-white">
      <div class="container d-flex justify-content-between align-items-center py-3">
        <div >
          <a href="{{ route('admin.dashboard') }}" class="btn ls-glass-badge px-4" ><i class="fa-solid fa-arrow-left text-white"></i></a>
        </div>
        <h1>Projects</h1>
        <div>
          <a href="{{route('admin.projects.create')}}" class="btn ls-glass-badge me-2 text-white"><i class="fa-solid fa-plus text-white"></i> Add new project</a>
        </div>
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
                  <td class="d-flex">
                    <a class="m-1 btn text-white" href="{{route('admin.projects.show', $project->slug)}}">
                      <i class="fa-regular fa-eye"></i>
                    </a>
                    <a class="m-1 btn text-white" href="{{route('admin.projects.edit', $project->slug)}}">
                      <i class="fa-solid fa-file-pen"></i> 
                    </a>
                    <form action="{{route('admin.projects.destroy', $project->slug)}}" method="POST" class="d-inline-block">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn m-1 text-danger" href="{{route('admin.projects.destroy', $project->slug)}}">
                        <i class="fa-solid fa-trash-can"></i>
                      </button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          {{ $projects->links('vendor.pagination.bootstrap-5') }}
        </div>
      </section>
@endsection