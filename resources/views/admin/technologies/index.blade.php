@extends('layouts.admin') 

@section('title', 'technologies')

@section('content')
    <section class="text-white">
      <div class="container d-flex justify-content-between align-items-center py-3">
        <div >
          <a href="{{ route('admin.dashboard') }}" class="btn ls-glass-badge px-4" ><i class="fa-solid fa-arrow-left text-white"></i></a>
        </div>
        <h1>technologies</h1>
        <div>
          <a href="{{route('admin.technologies.create')}}" class="btn ls-glass-badge me-2 text-white"><i class="fa-solid fa-plus text-white"></i> Add new technology</a>
        </div>
      </div>
      <div class="container ls-glass p-4">
        <table>
          <thead>
              <tr class="fs-4 my-4">
                <th scope="col">Id</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($technologies as $technology)
              <tr>
                <td>{{$technology->id}}</td>
                <td>{{$technology->title}}</td>
                <td>{{$technology->slug}}</td>
                <td>
                  <a class="m-1 btn text-white" href="{{route('admin.technologies.show', $technology->slug)}}">
                    <i class="fa-regular fa-eye"></i>
                  </a>
                  <a class="m-1 btn text-white" href="{{route('admin.technologies.edit', $technology->slug)}}">
                    <i class="fa-solid fa-file-pen"></i> 
                  </a>
                  <form action="{{route('admin.technologies.destroy', $technology->slug)}}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="m-1 btn text-danger delete-button" href="{{route('admin.technologies.destroy', $technology->slug)}}">
                      <i class="fa-solid fa-trash-can"></i>
                    </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
            </table>
          {{-- {{ $technologies->links('vendor.pagination.bootstrap-5') }} --}}
        </div>
      </section>
@endsection