<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{

  public function index()
  {
      // $events = Event::checkResidents();
      $events = Event::take(100)->orderBy('id', 'desc')->get();
      return view('pages.events', compact ('events'));
  }

    public function testProcessSqs()
    {
        $job = new \App\Jobs\ProcessSqs();
        $job->handle();
    }

}
