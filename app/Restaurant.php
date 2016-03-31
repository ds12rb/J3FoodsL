<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
	
    protected $table = 'restaurant';//this is the name of the table that this model is linked to if the table name is different change the value
	public $timestamps = false;
	protected $primaryKey = 'id';
	protected $fillable = ['id','companyname','address','province','city','postalcode','phoneno'];

    public function customer()
     {
         //return $this->belongsToMany('Customer');
     }


}
