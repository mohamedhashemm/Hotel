@extends('layouts.starter')

@section('title', 'Edit Category')

@section('breadcrumb')
    @parent

    <li class="breadcrumb-item active">Categories</li>
    <li class="breadcrumb-item active">Eidt Categoy</li>

@endsection

@section('content')

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="exampleInputEmail1">Category Name</label>
            <input type="text" class="form-control" value="{{ old('name', $category->name) }}" name="name">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        </div>
        <div class="form-group">
            <label>Category Parent</label>
            <select name="parent_id" class="form-control form-select">
                <option value="">primary category</option>
                @foreach ($parents as $parent)
                    <option value="{{ $parent->id }}" @selected(old('parent_id', $category->parent_id) == $parent->id)>{{ $parent->name }}</option>
                @endforeach
            </select>
            @error('parent_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>Description</label>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <textarea name="description" class="form-control">{{ old('description', $category->description) }}</textarea>


        </div>
        <div class="form-group">
            <label>Image</label>
            <input type="file" class="form-control" name="image" accept="image/">
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            @if ($category->image)
                <img src="{{ asset('storage/' . old('image', $category->image)) }}" height="50" width="50"
                    alt="">
            @endif

        </div>

        <div class="form-group">
            <label for="">Status</label>
        </div>
        <div class="form-check">

            <input class="form-check-input" name="status" type="checkbox" value="active" @checked(old('status', $category->status) == 'active')>
            @error('status')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label class="form-check-label">
                active
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" name="status" type="checkbox" value="archived" @checked(old('status', $category->status) == 'archived')>
            @error('status')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label class="form-check-label">
                archived
            </label>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
