@extends('layouts.admin')
@section('title', 'Admin')

@section('content')
<div class="container mt-3">

    <h5>form</h5>
    <form action="/event/save" method="POST">
        @csrf
        @if (!empty($event?->id))
            <input type="hidden" name="id" value="{{ $event->id }}"/>
        @endif

        <input type="text" name="title" 
            class='form-control mb-3'
            value="{{ isset($event) ? $event->title : '' }}"
            placeholder="title">

        <input type="text" name="description" 
            class='form-control mb-3'
            value="{{ isset($event) ? $event->description : '' }}"
            placeholder="description">
    
        <select  name="category" class="form-select mb-3" aria-label="Default select example" 
            value="{{ isset($event) ? $event->category->name : '' }}"
            >
        @foreach($categories as $category)
        <option value="{{ $category->id }}"
            {{ (isset($event) && $event->category_id == $category->id) ? 'selected' : '' }}>
            
            {{ $category->name }}
        </option>
        @endforeach
        </select>
        
        <input type="text" name="organizer" 
            class='form-control mb-3'
            value="{{ isset($event) ? $event->organizer : '' }}"
            placeholder="organizer">

        <input type="date" name="date" class="form-select mb-3"
            value="{{ isset($event) ? $event->date : '' }}">

        <input type="text" name="location" 
            class='form-control mb-3'
            value="{{ isset($event) ? $event->location : '' }}"
            placeholder="location">

        <select class="form-select mb-3" aria-label="" name="status">
            <option value="upcoming" {{ (isset($event) && $event->status === 'upcoming') ? 'selected' : '' }}>upcoming</option>
            <option value="ongoing" {{ (isset($event) && $event->status === 'ongoing') ? 'selected' : '' }}>ongoing</option>
            <option value="completed" {{ (isset($event) && $event->status === 'completed') ? 'selected' : '' }}>completed</option>
            <option value="completed" {{ (isset($event) && $event->status === 'completed') ? 'selected' : '' }}>completed</option>
            <option value="postponed">postponed</option>
        </select>

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
