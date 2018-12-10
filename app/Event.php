<?php

namespace App;

use Carbon\Carbon;
use App\Jobs\SendPush;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
  protected $guarded = [];

  public static function checkResidents(){
    $alarm = Alarm::get();
    $residentLeaving = false;

    // Check if the alarm is off
    if($alarm[0]->status == 'off'){

      // Get the last 5 events where the location is 'gang'
      $latestEvents = Event::orderBy('id', 'desc')->take(5)->where('location', 'gang')->get();

      // If the last event has the type contact (the door)
      if ($latestEvents[0]->device_type == 'contact') {

        // Get the time the door changed state
        $doorTime = $latestEvents[0]->updated_at;

        foreach ($latestEvents as $event) {
          // Check if the event is from type motion && if its update time is within 2 minutes from the door update time.
          if($event->device_type == 'motion' && $event->updated_at->diffInSeconds($doorTime) < 121) {
            $residentLeaving = true;
          }
        }

        // If residentLeaving is true, we sent push
        // by not putting it in the foreach we prevent it from sending multiple times
        if ($residentLeaving) {
          SendPush::dispatch();
        }

      }
    }
  }

}
