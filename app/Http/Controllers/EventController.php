<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

use App\Http\Requests\CreateEventRequest;

use App\Services\ImageService;

use Carbon\Carbon;

class EventController extends Controller
{
    //
    // public function index

    public function index(Request $req)
    {
        if (!isset($req->size)) {
            $req->size = 10;
        }
        $events = Event::all()->take($req->size);



        if ($req->randomize) {
            $events = $events->shuffle();
        }


        /* Havent Figured Out How to Paginate after shuffling the array */
        
        // if ($req->size > 14) {
        //     $events   = $events->paginate(12);
        // }
        return response()->json($events, 200);
    }

    public function indexEvent()
    {
        $events = Event::all();

        return view('pages.event.event-index', compact('events'));
    }

    public function get(Request $req, $id)
    {
        $event = Event::find($id);

        return response()->json($event, 200);
    }

    public function store(CreateEventRequest $req)
    {
        $payload = collect($req);

        if ($req->hasFile('logo')) {
            $payload['logo'] = ImageService::storeImage($req->logo, 'event', 'event_');
        }

        if ($req->hasFile('image')) {
            $payload['image'] = ImageService::storeImage($req->image, 'image', 'image');
        }



        $event = Event::create($payload->toArray());
        return redirect()->to('event/');
    }
    
    public function destroy($id)
    {

        /* Only Simple Delete , Havent Deleted The Photo */
        $event = Event::destroy($id);
        return response()->json(['message' => 'success'], 200);
    }

    public function create()
    {
        return view('pages.event.event-create');
    }

    public function show($id)
    {
        $event = Event::find($id);

        return view('pages.event.event-show', compact('event'));
    }
}
