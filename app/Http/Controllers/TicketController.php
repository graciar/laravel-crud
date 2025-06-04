<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Ticket;

class TicketController extends Controller
{
    public function index(string $id){
        $event = Event::findOrFail($id);
        $tickets = Ticket::where('event_id', $id)->get();

        return view("ticket/index", ["event"=>$event, "tickets"=>$tickets]);
    }

    public function ticket(string $id){
        $event = Event::findOrFail($id);

        return view("ticket/form", ["event"=>$event]);
    }

    public function update(string $event_id, string $ticket_id){
        $event = Event::find($event_id);
        $ticket = Ticket::find($ticket_id);
        return view("ticket/form", [
            "event"=>$event,
            "ticket"=>$ticket,
        ]);
    }

    public function save(Request $request, string $event_id){

        // $request->validate([
        //     'type' => 'required|string|max:255',
        //     'seats' => 'required|integer|min:1',
        //     'price' => 'required|numeric|min:0',
        // ]);

        // $event = Event::findOrFail($id);

        if (isset($request->id)) {  // request ticket id
            $ticket = Ticket::find($request->id);
        }else{
            $ticket = new Ticket();
        }

        $ticket->event_id = $event_id; // request event_id 
        $ticket->type = $request->type;
        $ticket->seats = $request->seats;
        $ticket->avail_seats = $request->seats;
        $ticket->price = $request->price;
        $ticket->save();

        return redirect("ticket/event/$event_id"); // double quotes = variable interpolation
    }
    public function delete(Request $request, $event_id, $ticket_id) {
        if ($request->method() == "POST") {
            Ticket::find($ticket_id)->delete();
            return redirect("/ticket/event/$event_id");
        } else {
            $ticket = Ticket::find($ticket_id);
            $event = Event::find($event_id);

            return view("ticket/delete", [
                "ticket" => $ticket,
                "event" => $event,
            ]);
        }
    }
}
