@extends('layouts.starter')

@section('title', 'Categories')

@section('breadcrumb')
    @parent

    <li class="breadcrumb-item active">Categories</li>

@endsection

@section('content')

    <div>
        <a href="{{ route('categories.create') }}" class="btn btn-sm btn-outline-primary">Create</a>
        <a href="{{ route('categories.trash') }}" class="btn btn-sm btn-outline-danger">Trashed</a>

    </div>
   
    <br>

    @if (session()->has('success'))
        <div class=" alert alert-success">
            {{ session('success') }}

        </div>
    @endif




    <table class="table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Id</th>
                <th>Name </th>
                <th>Status </th>
                <th>Parent Id</th>
                <th>Create At</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @forelse($categories as $category)
                    <td><img src="{{ asset('storage/'. $category->image)}}" height="50" width="50" alt="" ></td>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->status }}</td>
                    <td>{{ $category->parent_id }}</td>
                    <td>{{ $category->created_at }}</td>
                    
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-outline-success">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>

            </tr>
        @empty
            <tr>
                <td colspan="7">No Category Define</td>
            </tr>
            @endforelse



        </tbody>



    </table>

    {{ $categories->links() }}

@endsection
