@extends('layouts.admin')
@section('title', 'Admin')

@section('content')
<div class="container mt-4">
    <h1 class="mb-3">Admin Dashboard</h1>

    <div class="alert alert-success d-flex justify-content-between align-items-center" role="alert">
        <div>
            <strong>Welcome back,</strong> {{ Auth::user()->email }}
        </div>
        <a href="/logout" class="btn btn-outline-danger btn-sm">Logout</a>
    </div>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Events</div>
                <div class="card-body">
                    <h5 class="card-title">Manage Events</h5>
                    <p class="card-text">Create, edit, and delete events.</p>
                    <a href="/event" class="btn btn-light btn-sm">Go to Events</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
