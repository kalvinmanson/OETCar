<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
  public function owner()
  {
    return $this->belongsTo('App\User', 'owner_id');
  }
  public function driver()
  {
    return $this->belongsTo('App\User', 'driver_id');
  }
}
