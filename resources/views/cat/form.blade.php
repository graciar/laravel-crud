@extends('layouts.admin')
@section('title', 'Admin')

@section('content')
<div class="container mt-3">
    <h5>category</h5>
    <div class="col-4">
        <form action="/cat/save" method="POST">
            @csrf
            @if (!empty($category?->id))
            <input type="hidden" name="id" value="{{ $category->id }}"/>
            @endif

            <input type="text" name="category"
                value="{{ isset($category) ? $category->name : "" }} " 
                placeholder="Enter Category"
                class='form-control mb-3'>
            <input type="submit" name="submit" value="submit">
        </form> 
    </div>   

</div>
@endsection
