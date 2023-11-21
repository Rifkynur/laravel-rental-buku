@extends('layouts.mainlayout')

@section('title','Edit Category')

@section('content')
<h1>Edit Category</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="mt-4 w-50">
    <form action="/categories-edit/{{ $category->name }}" method="POST">
        @csrf
        @method('put')
        <div>
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Category name" value="{{ $category->name }}" required>
        </div>
        <div class="mt-3">
            <a href="/categories" class="btn btn-primary">Back</a>
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </form>
</div>
@endsection