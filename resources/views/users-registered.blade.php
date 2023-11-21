@extends('layouts.mainlayout')
@section('title','Registered Users')

@section('content')
<h1>Registered Users List</h1>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="text-end">
    <a href="/users" class="btn btn-primary">Approved Users</a>
</div>
<div class="mt-3">
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($registeredUsers as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->user_name }}</td>
                <td>{{ $user->phone }}</td>
                <td>
                    <a href="/users-detail/{{ $user->slug }}" class="btn btn-success">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection