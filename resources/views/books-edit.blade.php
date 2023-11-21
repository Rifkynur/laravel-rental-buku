@extends('layouts.mainlayout')

@section('title','Add Books')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<h1 class="text-center">Edit Books</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{-- alert ketika sukses menambah mengedit dan menghapus buku --}}
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="container-fluid">
<div class="mt-4 w-75 mx-auto">
    <form action="/books-edit/{{ $book->slug }}" method="POST" class="border p-2 border-3 rounded border-dark" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="code" class="form-label">Code</label>
            <input type="text" value="{{ $book->book_code }}" name="book_code" id="code" class="form-control" placeholder="Book code" required>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" value="{{ $book->title }}" name="title" id="title" class="form-control" placeholder="Book title" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" id="image" class="form-control" placeholder="Book image" >
        </div>
        <div class="mb-3">
            <label for="" class="form-label d-block">Current Image </label>
            @if($book->cover != null)
                <img src="{{ asset('storage/cover/'.$book->cover) }}" alt="" class="w-50">
            @else
                <img src="{{ asset('img/untitled.jpg') }}" alt="">
            @endif
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select name="categories[]" id="category" class="form-control select-multiple" multiple>
                <option value="" disabled>Choose Category</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Current Categories</label>
            <ul>
                @foreach($book->categories as $category)
                <li>{{ $category->name }}</li>
                @endforeach
            </ul>
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Edit</button>
            <a href="/books" class="btn btn-danger">Back</a>
        </div>
    </form>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
    $('.select-multiple').select2();
});
</script>
@endsection