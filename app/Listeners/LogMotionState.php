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
              'alarm_id' => $device->alarm_id,
              'device_id' => $device->id,
              'device_type' => $device->type,
              'status' => $device->status,
              'location' => $device->location
          ]);

          // Event::checkResidents();
    }


}
