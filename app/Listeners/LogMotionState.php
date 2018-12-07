<?php

namespace App\Listeners;

use App\Event;
use App\Device;

use App\Events\MotionDetected;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogMotionState
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  MotionDetected  $event
     * @return void
     */
    public function handle(MotionDetected $data)
    {

      $device = Device::find($data->device_id);
      $createEvent = Event::Create(
          [
              'device_id' => $device->id,
              'status' => $device->status
          ]);
    }
}
