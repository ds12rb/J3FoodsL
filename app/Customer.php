<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    protected $table = 'customer'; //this is the name of the table that this model is linked to if the table name is different change the value
	protected $primaryKey = 'id';
	protected $fillable = ['id','phoneno'];
	public $timestamps = false;

    //a customer has many restaurant favorites
    public function favorites(){
        return $this->hasMany('Restaurant');
    }

    public function restaurant()
     {
         return $this->belongsToMany('Restaurant');
     }

}
