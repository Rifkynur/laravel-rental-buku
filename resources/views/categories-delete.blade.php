@extends('layouts.mainlayout')

@section('title','Delete Category')

@section('content')
<h2>Are you sure to delete {{ $category->name }}</h2>
<div class="mt-3">
    <a href="/categories-destroy/{{ $category->slug }}" class="btn btn-danger">Yes</a>
    <a href="/categories" class="btn btn-primary ms-3">No</a>
</div>
@endsection