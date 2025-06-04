
@extends('layouts.admin')
@section('title', 'Admin')

@section('content')
<div>
<h3>Ticket</h3>
<!-- <p>{{ $event->id }}</p> -->
<p>event: {{ $event->title }}</p>
<form action="/ticket/{{ $event->id }}/save" method="POST">
    @csrf
    @if (!empty($ticket?->id))
        <input type="hidden" name="id" value="{{ $ticket->id }}"/>
    @endif

    <input type="type" name="type" 
        value="{{ isset($ticket) ? $ticket->type : "" }} "  
        class='form-control mb-3'
        placeholder="tickets type">

    <input type="number" name="seats" 
        value="{{ isset($ticket) ? $ticket->seats : '' }}" 
        class='form-control mb-3'
        placeholder="Seats">

    <input type="number" name="price" 
        value="{{ isset($ticket) ? $ticket->price : '' }}" 
        class='form-control mb-3'
        placeholder="Price">

    <input type="submit" name="submit" 
        class="btn btn-success"
        value="submit">
</form>
</div>
@endsection
