@extends('layouts.mainlayout')
@section('title','Books Rent')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@if (session('message'))
    <div class="alert {{ session('alert-class') }}">
        {{ session('message') }}
    </div>
@endif
<div class="container-fluid">
    <div class="w-75 mx-auto border border-2 border-dark rounded p-3">
      <h1 class="mb-4 text-center">Books Rent</h1>
        <div>
            @if(session('mesage'))
            <div class="alert alert-danger">
                {{ session('masage') }}
            </div>
            @endif
        </div>
        <form action="/books-rent" method="POST">
            @csrf
            <div class="mb-3">
                <label for="user" class="form-label">User</label>
                <select name="user_id" id="user" class="form-control user">
                    <option value="" disabled>Select Users</option>
                    @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->user_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="books" class="form-label">Books</label>
                <select name="book_id" id="" class="form-control book">
                    <option value="" disabled>Select Book</option>
                    @foreach($books as $book)
                    <option value="{{ $book->id }}">{{ $book->book_code }} {{ $book->title }}</option>
                    @endforeach
                </select> 
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
    $('.user').select2();
    $('.book').select2();
});
</script>
@endsection