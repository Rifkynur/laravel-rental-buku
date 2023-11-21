@extends('layouts.mainlayout')

@section('title','Delete Book')

@section('content')
<h2>Are you sure to delete {{ $book->title }}</h2>
<div class="mt-3">
    <a href="/books-destroy/{{ $book->slug }}" class="btn btn-danger">Yes</a>
    <a href="/books" class="btn btn-primary ms-3">No</a>
</div>
@endsection