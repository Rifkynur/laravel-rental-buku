@extends('layouts.mainlayout')
@section('title','Books')

@section('content')
<h1>Books List</h1>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="text-end">
    <a href="/books-deleted" class="btn btn-secondary">view deleted data</a>
    <a href="/books-add" class="btn btn-primary">add data</a>
</div>
<div class="mt-3">
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Code</th>
                <th>Title</th>
                <th>Categories</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $book->book_code }}</td>
                <td>{{ $book->title }}</td>
                <td>@foreach($book->categories as $category)
                    {{ $category->name }} <br>
                    @endforeach
                </td>
                <td>{{ $book->status }}</td>
                <td>
                    <a href="/books-edit/{{ $book->slug }}" class="btn btn-warning">Edit</a>
                    <a href="/books-delete/{{ $book->slug }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection