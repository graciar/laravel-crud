@extends('layouts.admin')
@section('title', 'Admin')

@section('content')
<div class="container mt-3">
    <h1>dashboard</h1>
    <p>hello, {{ Auth::user()->email }}</p>
    <a href="/logout">logout</a>
</div>
@endsection
