@extends('layouts.admin') 

@section('title', 'types')

@section('content')
    <section>
      <div class="container d-flex justify-content-between align-items-center py-3">
        <div >
          <a href="{{ route('admin.dashboard') }}" class="btn ls-glass-badge px-4" ><i class="fa-solid fa-arrow-left"></i></a>
        </div>
        <h1>types</h1>
        <div>
          <a href="{{route('admin.types.create')}}" class="btn ls-glass-badge me-2 text-white"><i class="fa-solid fa-plus"></i> Add new type</a>
        </div>
      </div>
      <div class="container ls-glass p-4">
        <table>
          <thead class="fs-4">
              <tr class="my-4">
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Slug</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($types as $type)
              <tr>
                <td>{{$type->id}}</td>
                <td>{{$type->name}}</td>
                <td>{{$type->slug}}</td>
                <td>
                  <a class="m-1 btn" href="{{route('admin.types.show', $type->slug)}}">
                    <i class="fa-regular fa-eye"></i>
                  </a>
                  <a  class="m-1 btn" href="{{route('admin.types.edit', $type->slug)}}">
                    <i class="fa-solid fa-file-pen"></i> 
                  </a>
                  <form action="{{route('admin.types.destroy', $type->slug)}}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class=" btn m-1 text-danger delete-button" href="{{route('admin.types.destroy', $type->slug)}}">
                      <i class="fa-solid fa-trash-can icon-delete"></i>
                    </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
            </table>
          {{-- {{ $types->links('vendor.pagination.bootstrap-5') }} --}}
        </div>
      </section>
@endsection