@extends('layouts.mainlayout')

@section('title','Deleted Books')

@section('content')
<h1>Deleted Books List</h1>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Code</th>
                <th>Title</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($deletedBooks as $item)               
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->book_code }}</td>
                <td>{{ $item->title }}</td>
                <td>
                    <a href="/books-restore/{{ $item->slug }}" class="btn btn-info">Restore</a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <div>
        <a href="/books" class="btn btn-primary">Back</a>
    </div>
</div>
@endsection