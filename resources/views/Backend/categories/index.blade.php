@extends('layouts.dashbord')

@section('titel')
Categories<a class="btn btn-outline-primary btn-sm mr-1" href="{{ route('backend_create') }}">Create</a>
@endsection

@section('contant')

<table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Parent</th>
      <th>Status</th>
      <th>Created At</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($categories as $category)
    <tr>
      <td>{{ $category->id }}</td>
      <td>{{ $category->name }}</td>
      <td>{{ $category->parent_id }}</td>
      <td>{{ $category->status }}</td>
      <td>{{ $category->created_at }}</td>
      <td>
        <div class="d-flex">
          <a class="btn btn-outline-primary btn-sm mr-1" href="{{ route('edit', [$category->id]) }}">Edit</a>
          <form method="post" action="{{ route('delete', [$category->id]) }}">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-outline-danger btn-sm delete">Delete</button>
          </form>
        </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection