<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Event;
use App\Models\Ticket;

class EventController extends Controller
{
    public function index(){
        $events = Event::with('category:id,name')->get(["id", "title", "description", "category_id", "organizer", "date", "location", "status"]);
        return view("event/index", ["events"=>$events]);
    }

    public function add(){
        $categories = Category::all(["id", "name"]);
        return view("event/form", [
            "categories" => $categories
        ]);
    }

    public function save(Request $request){
        if(isset($request->id)){
            $event = Event::find($request->id);
        }else{
            $event = new Event();
        }
        $event->title = $request->title;
        $event->description = $request->description;
        $event->category_id = $request->category;
        $event->organizer = $request->organizer;
        $event->date = $request->date;
        $event->location = $request->location;
        $event->status = $request->status;
        $event->save();

        return redirect("/event");
    }

    public function delete(Request $request) {
       if ($request->method() == "POST") {
           EVent::find($request->id)->delete();
           return redirect("/event");
       } else {
           $event = Event::find($request->id);
           return view("event/delete", ["event" => $event]);
       }
   }


   // user

    public function showEvents(){
        $events = Event::with(['category:id,name', 'tickets:id,event_id,type'])->get([
            'id', 'title', 'description', 'category_id', 'organizer', 'date', 'location', 'status'
        ]);


        return view("user/events", [
            "events"=>$events,
        ]);
    }

}
