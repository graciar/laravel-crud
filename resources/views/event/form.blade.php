@extends('layouts.admin')
@section('title', 'Admin')

@section('content')
<div class="container mt-3">

    <h5>form</h5>
    <form action="/event/save" method="POST">
        @csrf
        
        <input type="text" name="title" 
            class='form-control mb-3'
            placeholder="title">

        <input type="text" name="description" 
            class='form-control mb-3'
            placeholder="description">
    
        <select  name="category" class="form-select mb-3" aria-label="Default select example" >
        @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
        </select>
        
        <input type="text" name="organizer" 
            class='form-control mb-3'
            placeholder="organizer">

        <input type="date" name="date" class="form-select mb-3">

        <input type="text" name="location" 
            class='form-control mb-3'
            placeholder="location">

        <input type="text" name="status"
            class='form-control mb-3'
            placeholder="status">

        <input type="submit" name="submit" 
            class="btn btn-success"
            value="Save">
    </form>



    <!-- <div class="mb-3">
        <input type="text" class="form-control" 
            name="title" placeholder="Events Title">
        <input type="text" class="form-control"
            name="description" placeholder="Description">        
    </div> -->
</div>
@endsection
