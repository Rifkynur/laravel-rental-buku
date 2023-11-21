@extends('layouts.mainlayout')

@section('title','Delete User')

@section('content')
<h2>Are you sure to delete {{ $user->user_name }}</h2>
<div class="mt-3">
    <a href="/users-destroy/{{ $user->slug }}" class="btn btn-danger">Yes</a>
    <a href="/users" class="btn btn-primary ms-3">No</a>
</div>
@endsection