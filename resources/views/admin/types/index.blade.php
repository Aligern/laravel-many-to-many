@extends('layouts.admin') 

@section('title', 'Types')

@section('content')
    <section>
      <div class="d-flex justify-content-between align-items-center py-3">
        <h1>Types</h1>
        <a href="{{route('admin.types.create')}}" class="btn btn-primary me-2"><i class="fa-solid fa-plus"></i> Add new type</a>
      </div>
        <table class="table table-striped">
          
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
                @foreach ($types as $type)
                <tr>
                  <td>{{$type->id}}</td>
                  <td>{{$type->name}}</td>
                  <td>{{$type->slug}}</td>
                  <td>{{$type->created_at}}</td>
                  <td>{{$type->updated_at}}</td>
                  <td>
                    <a href="{{route('admin.types.show', $type->slug)}}">
                      <i class="fa-regular fa-eye"></i>
                    </a>
                    <a href="{{route('admin.types.edit', $type->slug)}}">
                      <i class="fa-solid fa-file-pen"></i> 
                    </a>
                    <form action="{{route('admin.types.destroy', $type->slug)}} method="POST" class="d-inline-block">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="delete-button" data-item-title="{{$type->name}}" href="{{route('admin.types.destroy', $type->slug)}}">
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