@extends('layouts.mainlayout')

@section('title','Deleted Category')

@section('content')
<h1>Deleted Category List</h1>
<div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($deletedCategories as $item)               
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>
                    <a href="categories-restore/{{ $item->slug }}" class="btn btn-info">Restore</a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <div>
        <a href="/categories" class="btn btn-primary">Back</a>
    </div>
</div>
@endsection