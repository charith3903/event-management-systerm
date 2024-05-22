<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class DbEventShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
     {
        $event = Event::findOrFail($id);

        return view('dbEventShow', compact('event'));


    }
}
