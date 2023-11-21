@extends('layouts.mainlayout')

@section('title','Category')

@section('content')
<h1>Category List</h1>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="text-end">
    <a href="/categories-deleted" class="btn btn-secondary mb-3 me-2">view deleted data</a>
    <a href="/categories-add" class="btn btn-primary mb-3">add data</a>
</div>
<div>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $item)               
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>
                    <a href="categories-edit/{{ $item->slug }}" class="btn btn-warning">Edit</a>
                    <a href="categories-delete/{{ $item->slug }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection