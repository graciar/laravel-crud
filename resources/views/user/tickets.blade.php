@extends('layouts.user')
@section('title', 'tickets')

@section('content')
<div>
    <h2 class='mt-3'>Available Ticket</h2>
    <!-- <p>hello, {{ Auth::user()->email }}</p> -->
    <p><strong>{{ $event->title }}</strong></p>
    <div class="d-flex flex-wrap gap-3">
        @foreach($tickets as $ticket)
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $ticket->type }}</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">remaining seats: {{ $ticket->avail_seats }}</h6>
                <p class="card-text"><strong> price: {{ $ticket->price }} </strong></p>
                <a href="/event/{{ $event->id }}/{{ $ticket->type }}/details" class="text-blue-500 hover:text-blue-700">View Details</a><br>
                
                
                <!-- <a href="/event/{{ $event->id }}/{{ $ticket->type }}/purchase" class="btn btn-danger mt-2">Buy</a> -->


                <!-- Trigger button -->
                <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#buyModal">
                Buy Tickets
                </button>

                <!-- Modal -->
                <div class="modal fade" id="buyModal" tabindex="-1" aria-labelledby="buyModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">

                        <form action="/event/{{ $event->id }}/{{ $ticket->type }}/purchase" method="POST" class="modal-content">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="buyModalLabel">Buy Tickets for {{ $event->title }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body d-flex align-items-center gap-2">
                                <label for="qty" class="form-label mb-0 me-2">Quantity:</label>
                                
                                <button type="button" class="btn btn-outline-secondary" id="decreaseQty">-</button>
                                
                                <input
                                type="number"
                                name="qty"
                                id="qty"
                                class="form-control text-center"
                                style="width: 70px;"
                                min="1"
                                max="{{ $ticket->avail_seats }}"
                                value="{{ $qty }}"
                                readonly
                                required
                                >
                                
                                <button type="button" class="btn btn-outline-secondary" id="increaseQty">+</button>
                            </div>

                            <small class="text-muted ms-3">Available: {{ $ticket->avail_seats }} tickets</small>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger">Confirm Purchase</button>

                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div><br>
        @endforeach
    </div>
</div>
@endsection


<script>
  document.addEventListener('DOMContentLoaded', function () {
    const qtyInput = document.getElementById('qty');
    const decreaseBtn = document.getElementById('decreaseQty');
    const increaseBtn = document.getElementById('increaseQty');
    const maxQty = parseInt(qtyInput.getAttribute('max'));

    decreaseBtn.addEventListener('click', function () {
      let currentVal = parseInt(qtyInput.value);
      if (currentVal > 1) {
        qtyInput.value = currentVal - 1;
      }
    });

    increaseBtn.addEventListener('click', function () {
      let currentVal = parseInt(qtyInput.value);
      if (currentVal < maxQty) {
        qtyInput.value = currentVal + 1;
      }
    });
  });
</script>