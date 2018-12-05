<?php

namespace App\Providers;

use App\Providers\SensorTriggerd;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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
        //
    }
}
