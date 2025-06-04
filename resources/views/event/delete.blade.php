@extends('layouts.admin')
@section('title', 'Admin')

@section('content')
<div class="row mt-4">
   <div class="col-4 offset-4">
       <form action="/event/delete/{{ $event->id }}" method="post">
           @csrf
           <div class="mb-3">
               <h4>Are you sure you want to delete:</h4>
               <h5>Event: {{ $event->title }}</h5>
           </div>
           <div class="mb-3">
               <button type="submit" class="btn btn-success">Confirm</button>
               <a href="/event" class="btn btn-warning">Cancel</a>
           </div>
           <div class="mt-4">
               @if (!empty(session("error")))
                   {{ session("error", "") }}
               @endif
           </div>
       </form>
   </div>
</div>

@endsection
