@extends('layouts.mainlayout')

@section('title','Users Banned List')

@section('content')
<h1>Users banned List</h1>
<div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bannedUsers as $item)               
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->user_name }}</td>
                <td>{{ $item->phone }}</td>
                <td>
                    <a href="/users-restore/{{ $item->slug }}" class="btn btn-info">Restore</a>
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