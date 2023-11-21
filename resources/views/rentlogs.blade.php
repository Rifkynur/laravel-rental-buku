@extends('layouts.mainlayout')

@section('title','Rent Logs')

@section('content')
<h1 class="mb-4">Halaman Rent Logs list</h1>

<div>
  <x-rent-log-table :rentlog='$rentlog' />
</div>
@endsection