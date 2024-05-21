<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
     {
        $event = Event::findOrFail($id);

        return view('eventsShow', compact('event'));


    }
}
