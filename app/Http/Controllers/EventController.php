<?php

namespace App\Http\Controllers;

use App\Event;
use App\Jobs\ProcessEvents;

use App\Events\MotionDetected;
use App\Events\DoorOpendDetected;
use App\Events\DoorClosedDetected;

use Illuminate\Http\Request;

class EventController extends Controller
{

    public function store(Request $request)
    {
        $device_id = $request->device_id;
        $device_type = $request->device_type;
        $device_status = $request->device_status;

        if ($device_type == 'motion') {
            event(new MotionDetected($device_id));
        }
        if($device_type == 'connection') {
            event(new MotionDetected($device_id));
        }


        // ProcessEvents::dispatch($request)
        //         ->delay(now()->addSeconds(3));
        //
        // // Redirect after succes
        return redirect()->back();
    }
}
