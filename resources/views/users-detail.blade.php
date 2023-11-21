@extends('layouts.mainlayout')
@section('title','Users Detail')

@section('content')
<h1>Detail User</h1>
<div class="mb-3 text-end">
    @if($user->status == 'inactive')
        <a href="/users-approve/{{ $user->slug }}" class="btn btn-info">Approve User</a>
        <a href="/users" class="btn btn-danger">Back</a>
    @else
        <a href="/users" class="btn btn-danger">Back</a>
    @endif
</div>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="container">
    <div class="w-50 mx-auto p-3 border border-4 border-dark rounded">
        <div>
            <label for="" class="form-label">Username</label>
            <input type="text" value="{{ $user->user_name }}" readonly class="form-control">
        </div>
        <div>
            <label for="" class="form-label">Phone</label>
            <input type="text" value="{{ $user->phone }}" readonly class="form-control">
        </div>
        <div>
            <label for="" class="form-label">Address</label>
            <textarea name="" id="" cols="30" rows="6" readonly class="form-control">{{ $user->address }}</textarea>
        </div>
        <div>
            <label for="" class="form-label">Status</label>
            <input type="text" value="{{ $user->status }}" readonly class="form-control">
        </div>
    </div>
</div>
<div class="mt-4">
    <h2>User Rent Log</h2>
    <x-rent-log-table :rentlog='$rentlog'/>
</div>
@endsection