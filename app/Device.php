<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{

  public function alarm(){
      return $this->belongsTo(Alarm::class);
  }

}
