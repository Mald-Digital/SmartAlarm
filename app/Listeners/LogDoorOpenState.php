<?php

namespace App\Listeners;

use App\Device;
use App\Event;

use App\Events\DoorOpendDetected;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogDoorOpenState
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
     * @param  DoorOpendDetected  $event
     * @return void
     */
    public function handle(DoorOpendDetected $data)
    {
      $device = Device::find($data->device_id);
      $createEvent = Event::Create(
          [
              'alarm_id' => $device->alarm_id,
              'device_id' => $device->id,
              'status' => $device->status
          ]);
    }
}
