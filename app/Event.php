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

      $latestEvents = Event::orderBy('id', 'desc')->take(2)->get();

      $timestamp1 = $latestEvents[0]->updated_at;
      $timestamp2 = $latestEvents[1]->updated_at;
      $timespan = $timestamp1->diffInSeconds($timestamp2);

      if($alarm[0]->status == 'off'){
        if($timespan < 121)
          if($latestEvents[0]->device_type == 'contact' && $latestEvents[1]->device_type == 'motion'){

            SendPush::dispatch()
                ->delay(now()->addSeconds(1));
          }
          else {
            echo "er is iemand thuis";
            echo '<br /><br />';
          }

      }
      else {
        echo "Niks aan de hand, het alarm staat aan.";
        echo '<br /><br />';
      }
  }

}
