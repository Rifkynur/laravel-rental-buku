@extends('layouts.mainlayout')
@section('title','Dashboard')

@section('content')

<h1>Wellcome, {{ Auth::user()->user_name }}</h1>
<div class="container-fuid">
    <div class="row mt-4">
        <div class="col-lg-4">
            <div class="card-data p-3 bg-warning rounded mb-3">
                <div class="row">
                    <div class="col-6"><i class="bi bi-journal-bookmark"></i>
                    </div>
                    <div class="col-6  d-flex justify-content-center flex-column text-end">
                        <span class="card-desc">Books</span>
                        <span class="card-count">{{ $book_count }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card-data p-3 bg-primary rounded mb-3">
                <div class="row">
                    <div class="col-6"><i class="bi bi-list-task"></i>
                    </div>
                    <div class="col-6  d-flex justify-content-center flex-column text-end">
                        <span class="card-desc">Categories</span>
                        <span class="card-count">{{ $category_count }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card-data p-3 bg-danger rounded mb-3">
                <div class="row">
                    <div class="col-6"><i class="bi bi-people"></i>
                    </div>
                    <div class="col-6  d-flex justify-content-center flex-column text-end">
                        <span class="card-desc">Users</span>
                        <span class="card-count">{{ $user_count }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection