<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
  protected $table = 'items';//this is the name of the table that this model is linked to if the table name is different change the value

  public function restaurant(){
	  return $this->belongsTo(Restaurant::class);
  }
}
