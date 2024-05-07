@extends('layouts.starter')

@section('title', 'products')

@section('breadcrumb')
    @parent

    <li class="breadcrumb-item active">products</li>

@endsection

@section('content')

    <div>
        <a href="{{ route('products.create') }}" class="btn btn-sm btn-outline-primary">Create</a>
      

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
                <th>Category </th>
                <th>Store </th>
                <th>Status </th>
                <th>Parent Id</th>
                <th>Create At</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @forelse($products as $product)
                    <td><img src="{{ asset('storage/'. $product->image)}}" height="50" width="50" alt="" ></td>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category_id }}</td>
                    <td>{{ $product->store_id }}</td>
                    <td>{{ $product->status }}</td>
                    <td>{{ $product->parent_id }}</td>
                    <td>{{ $product->created_at }}</td>
                    
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-outline-success">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>

            </tr>
        @empty
            <tr>
                <td colspan="7">No product Define</td>
            </tr>
            @endforelse



        </tbody>



    </table>

    {{ $products->links() }}

@endsection
