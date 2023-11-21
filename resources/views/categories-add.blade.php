@extends('layouts.mainlayout')

@section('title','Add Category')

@section('content')
<h1>New Category</h1>
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
    <form action="/categories-add" method="POST" class="border border-3 border-dark rounded p-3">
        @csrf
        <div>
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Category name" required>
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">add</button>
        </div>
    </form>
</div>
@endsection