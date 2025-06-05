<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


<div class="container my-5 p-4 border rounded shadow-sm" style="max-width: 600px;">
    <h1 class="mb-4">Detail Purchase</h1>

    <!-- <p><strong>Hello,</strong> {{ Auth::user()->name }}</p> -->
    <p><strong>Event:</strong> {{ $event->title }}</p>
    <p><strong>Ticket:</strong> {{ $ticket->type }}</p>
    <p><strong>Quantity:</strong> {{ $qty }}</p>
    <p><strong>Price:</strong> IDR {{ number_format($price, 2) }}</p>

    <form method="POST" action="/event/{{ $ticket->id }}/purchase/save">
         @csrf
        <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
        <input type="hidden" name="qty" value="{{ $qty }}">
                <input type="hidden" name="total" value="{{ $price }}">
        <button type="submit" class="btn btn-primary mt-3 w-100">Confirm</button>
    </form>
</div>
