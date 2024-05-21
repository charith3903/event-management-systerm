<?php

namespace App\Http\Controllers;

use App\Models\Event;

class DashBoardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $events = Event::with('country', 'tags')->where('start_date', '>=', today())->orderBy('created_at', 'desc')->get();

        return view('dashboard', compact('events'));
    }
}
