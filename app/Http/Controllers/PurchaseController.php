<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Ticket;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function confirm(Request $request, string $event_id, string $ticket_type){
        $qty = $request->input('qty');  // default to 1 if not present
        $event = Event::findOrFail($event_id);
        $ticket = Ticket::where('event_id', $event_id)
                    ->where('type', $ticket_type)
                    ->firstOrFail();

        $price = $qty * $ticket->price;
        
        return view("user/purchase", [
            "event"=>$event, 
            "ticket"=>$ticket,
            "qty" => $qty,
            "price" => $price,
        ]);
    }

    public function save(Request $request, string $ticket_id){
        $ticket = Ticket::findOrFail($ticket_id);

        $purchase = new Purchase();

        $purchase->user_id = Auth::id(); // or auth()->id() 
        $purchase->event_id = $ticket->event_id;
        $purchase->ticket_id = $ticket_id;
        $purchase->qty = $request->qty;
        $purchase->total_price = $request->total;
        $purchase->save();

        return redirect('/home');
    }

    public function myTickets(){
        $purchases = Purchase::with(['ticket', 'event'])
            ->where('user_id', Auth::id())
            ->get(['id', 'user_id', 'event_id', 'ticket_id', 'qty', 'total_price', 'status']);


        return view("user/mytickets", ["purchases"=>$purchases]);

    }
}
