@extends('layouts.starter')

@section('title', 'Categories')

@section('breadcrumb')
    @parent

    <li class="breadcrumb-item active">Categories</li>

@endsection

@section('content')

    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Category Name</label>
            <input type="text" class="form-control" name="name">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror


        </div>
        <div class="form-group @error('parent_id') is-invalid @enderror">
            <label>Category Parent</label>
            <select name="parent_id" class="form-control form-select">
                <option value="">primary category</option>
                @foreach ($parents as $parent)
                    <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                @endforeach
            </select>
            @error('parent_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group @error('description') is-invalid @enderror">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror


        </div>
        <div class="form-group">
            <label>Image</label>
            <input type="file" class="form-control" name="image" accept="image/">
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        </div>

        <div class="form-group @error('status') is-invalid @enderror">
            <label for="">Status</label>
        </div>
        <div class="form-check">

            <input class="form-check-input" name="status" type="checkbox" value="active">
            <label class="form-check-label">
                active
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" name="status" type="checkbox" value="archived">
            <label class="form-check-label">
                archived
            </label>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
