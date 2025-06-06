@extends('layouts.admin')
@section('title', 'Admin')

@section('content')
<div class="container mt-3">
    <h5>event</h5>

    <a href="/event/add" class="btn btn-primary">Add Event</a>
    <table class="table table-sm table-bordered mt-4">
        <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Organizer</th>
                <th>Date</th>
                <th>Status</th>
                <th colspan="3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
            <tr>
                <td>{{ $event->title }}</td>
                <td>{{ $event->category->name }}</td>
                <td>{{ $event->organizer }}</td>
                <td>{{ $event->date }}</td>
                <td>{{ $event->status }}</td>

                <td>
                    <a href="/ticket/event/{{ $event->id }}" class="btn btn-info">Ticket</a>
                </td>
                <td>
                    <a href="/event/edit/{{ $event->id }}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                    <a href="event/delete/{{ $event->id }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
