@extends('layouts.user')
@section('title', 'home')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">My Tickets</h2>

    <div class="row g-4">
        @foreach ($purchases as $purchase)
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <h5 class="card-title">{{ $purchase->event->title }}</h5>
                        <p class="card-subtitle mb-2 text-muted">{{ \Carbon\Carbon::parse($purchase->event->date)->format('F j, Y') }}</p>

                        <hr>

                        <p class="mb-2"><strong>Ticket Type:</strong> {{ $purchase->ticket->type }}</p>
                        <p class="mb-1">
                            <strong>Status:</strong>
                            <span class="px-1 py-1 rounded bg-secondary text-white">
                                {{ ucfirst($purchase->status) }}
                            </span>
                        </p>
                    </div>
                    <a href="#" class="btn btn-info mt-3 w-100">View Ticket</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
