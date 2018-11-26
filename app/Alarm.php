<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alarm extends Model
{

  // Connected devices
  public function devices()
  {
      return $this->hasMany(Device::class, 'alarm_id');
  }

}
