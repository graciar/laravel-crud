@extends('layouts.admin')
@section('title', 'Admin')

@section('content')

<div class="container mt-4">
    <h1 class="mb-3">Ticket</h1>
    <p><strong>{{ $event->title }}</strong></p>
    <a href="/ticket/event/{{ $event->id }}/create" class="btn btn-primary">Add Ticket Category</a><br><br>
    @if(isset($tickets) && $tickets->count() > 0)
        <div class="d-flex flex-wrap gap-3 mt-3">
            @foreach($tickets as $ticket)
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $ticket->type }}</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">total seats: {{ $ticket->seats }}</h6>
                        <h6 class="card-subtitle mb-2 text-body-secondary">remaining seats: {{ $ticket->avail_seats }}</h6>
                        <p class="card-text"><strong> price: {{ $ticket->price }} </strong></p>
                        <a href="/ticket/event/{{ $event->id }}/edit/{{ $ticket->id }}" class="btn btn-success">Edit</a>
                        <a href="/ticket/event/{{ $event->id }}/delete/{{ $ticket->id }}" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>No tickets available.</p>
    @endif
</div>
@endsection

