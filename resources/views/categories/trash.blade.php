@extends('layouts.starter')

@section('title', 'Trashed Categories')

@section('breadcrumb')
    @parent


    <li class="breadcrumb-item ">Categories</li>
    <li class="breadcrumb-item active">Trashed</li>
@endsection

@section('content')

    <div>
        <a href="{{ route('categories.index') }}" class="btn btn-sm btn-outline-primary">Back</a>

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

                <th>Deleted At</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @forelse($categories as $category)
                    <td><img src="{{ asset('storage/' . $category->image) }}" height="50" width="50" alt=""></td>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->status }}</td>

                    <td>{{ $category->deleted_at }}</td>


                    <td>
                        <form action="{{ route('categories.restore', $category->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <button class="btn btn-sm btn-outline-danger">Restored</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('categories.force-delete', $category->id) }}" method="POST">
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

 

@endsection
