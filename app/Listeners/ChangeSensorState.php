<?php

namespace App\Listeners;

use App\Events\SensorTriggerd;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;


// use App\

class ChangeSensorState
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
     * @param  SensorTriggerd  $event
     * @return void
     */
    public function handle(SensorTriggerd $event)
    {
        dd($event->device->status);
    }
}
