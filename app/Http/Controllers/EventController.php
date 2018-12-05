<?php

namespace App\Http\Controllers;

use App\Event;
use App\Jobs\ProcessEvents;

use Illuminate\Http\Request;

class EventController extends Controller
{

    public function store(Request $request)
    {
      ProcessEvents::dispatch($request)
                ->delay(now()->addSeconds(3));
    }
}
