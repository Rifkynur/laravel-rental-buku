@extends('layouts.mainlayout')
@section('title','Profile')

@section('content')
<div class="mt-4">
    <h2>your Rent Log</h2>
    <x-rent-log-table :rentlog='$rentlog'/>
</div>
@endsection