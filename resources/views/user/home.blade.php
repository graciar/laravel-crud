@extends('layouts.user')
@section('title', 'Home')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm p-4">
        <h1 class="mb-4">Welcome, {{ Auth::user()->name }}!</h1>
        
        <p class="lead">Glad to see you back.</p>
        
        <a href="/logout" class="btn btn-danger mt-3">Logout</a>
    </div>
</div>
@endsection
