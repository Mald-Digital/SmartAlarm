<?php

namespace App\Listeners;

use App\Event;

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
        $createEvent = Event::Create(
            [
                'device_id' => $data->device_id,
                'status' => 'motion detected'
            ]);
    }
}
