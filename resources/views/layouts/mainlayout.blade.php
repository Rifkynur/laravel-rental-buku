<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>Rental Buku | @yield('title')</title>
</head>
<body>
  <div class="main d-flex justify-content-between flex-column">
    <nav class="navbar navbar-expand-lg bg-success navbar-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Rental Buku</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </nav>

      <div class="body-content h-100 ">
        <div class="row g-0 h-100">
          <div class="sidebar col-lg-2 bg-secondary text-white collapse d-lg-block" id="sidebar">
            @if(Auth::user())
              @if (Auth::user()->role_id == 1)    
                  <a href="/dashboard" class="{{ request()->is('dashboard') ? 'active' : ''}} " >Dashboard</a>
                  <a href="/" class="{{ request()->is('/') ? 'active' : ''}}">Book List</a>
                  <a href="/rentlogs" class="{{ request()->is('rentlogs') ? 'active' : ''}}">Rent Logs</a>
                  <a href="/books" class="{{ request()->is('books') ? 'active' : ''}} || {{ request()->is('books-add') ? 'active' : ''}} || {{ request()->is('books-deleted') ? 'active' : ''}} || {{ request()->is('books-edit/{slug}') ? 'active' : ''}}">Books</a>
                  <a href="/categories" class="{{ request()->is('categories') ? 'active' : ''}} || {{ request()->is('categories-deleted') ? 'active' : ''}} || {{ request()->is('categories-add') ? 'active' : ''}}">Categories</a>
                  <a href="/users" class="{{ request()->is('users') ? 'active' : ''}}">Users</a>
                  <a href="/books-rent" class="{{ request()->is('books-rent') ? 'active' : ''}}">Books Rent</a>
                  <a href="/books-return" class="{{ request()->is('books-return') ? 'active' : ''}}">Book Return</a>
                  <a href="/logout">Log Out</a>
              @else
                  <a href="/profile" class="{{ request()->is('profile') ? 'active' : ''}}">Profile</a>
                  <a href="/" class="{{ request()->is('/') ? 'active' : ''}}">Book List</a>
                  <a href="/logout">Log Out</a>
                  @endif
            @else 
                <a href="/login">Login</a>
            @endif
          </div>
          <div class="content col-lg-10 p-4">
            @yield('content')
          </div>
        </div>
      </div>
  </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>