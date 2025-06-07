@extends('layouts.user')
@section('title', 'events')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Events</h2>

   <div class="d-flex flex-wrap gap-3">
        @foreach($events as $event)
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('images/#') }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $event->title }}</h5>
                <p class="card-text">{{ $event->description }}</p>

                <a href="/event/{{ $event->id }}" class="btn btn-primary">Show Ticket</a>
                <!-- @foreach($event->tickets as $ticket)
                    <a href="/event/{{ $event->id }}/{{ $ticket->type }}" class="btn btn-primary">
                         {{ $ticket->type }}
                    </a>
                @endforeach -->
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection