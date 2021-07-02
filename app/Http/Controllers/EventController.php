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

    public function get(Request $req, $id)
    {
        $event = Event::find($id);

        return response()->json($event, 200);
    }

    public function store(CreateEventRequest $req)
    {
        $payload = collect($req);
        $timestamps = Carbon::now()->toDateTimeString(); //Timestamps for file naming

        $payload['logo'] = ImageService::storeImage($req->logo, 'event', 'event_'.$timestamps);
        $payload['image'] = ImageService::storeImage($req->image, 'image', 'image'.$timestamps);



        $event = Event::create($payload->toArray());
        return response()->json($event, 200);
    }
    
    public function destroy($id)
    {

        /* Only Simple Delete , Havent Deleted The Photo */
        $event = Event::destroy($id);
        return response()->json(['message' => 'success'], 200);
    }
}
