<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Event;

class EventController extends Controller
{

    public function store(Request $request)
    {
      $device_id = request('device_id');
      $device_status = request('device_status');
      $device_type = request('device_type');

      $createEvent = Event::Create(
          [
              'sensor_id' => $device_id,
              'status' => $device_status,
              'type' => $device_type
          ]);

      // Redirect after succes
      return redirect()->back();
    }
}
