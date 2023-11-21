@extends('layouts.mainlayout')
@section('title','Books')

@section('content')
<div class="container">
    <form action="">
        <div class="mb-3 row">
            <div class="col-12 col-md-6">
                <select name="category" id="" class="form-control">
                    <option value="" disabled >Choose Category</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-md-6">
                <div class="input-group ">
                    <input type="text" name="title" class="form-control" placeholder="Book Title">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </div>
        </div>
    </form>
    <div class="row">
        @foreach($books as $book)
            <div class="col-10 col-md-6 col-lg-3 mb-3 ">
                <div class="card h-100 shadow">
                    <img src="{{ $book->cover != null ? asset('storage/cover/'.$book->cover) : asset('img/untitled.jpg') }}" class="card-img-top" alt="..." style="height: 250px" draggable="false">
                    <div class="card-body">
                    <h5 class="card-title">{{ $book->book_code }}</h5>
                    <p class="card-text fw-bolder">{{ $book->title }}</p>
                    <div class="text-end">
                        <p class="badge {{ $book->status == 'in stock' ? 'text-bg-success' : 'text-bg-danger' }} ">{{ $book->status }}</p>
                    </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection