@extends('layouts.user')
@section('title', 'home')

@section('content')
<div>
    <h1 class='mt-3'>Home</h1>
    <p>hello, {{ Auth::user()->name }}</p>

    <br>
    <a href="/logout">logout</a>
</div>
@endsection