<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

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
}
