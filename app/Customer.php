<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    protected $table = 'customer'; //this is the name of the table that this model is linked to if the table name is different change the value
	protected $primaryKey = 'id';
	protected $fillable = ['id','phoneno','is_guest'];
	public $timestamps = false;

    /**
        Customer's favourites
    */
    public function favourites(){
        return $this->hasMany('App\CustomerFavourites');
    }

    /*
    public function restaurant()
     {
        return $this->belongsToMany('App\Restaurant');
     }*/

    /**
        Orders in the customer's cart
    */
    public function cart(){
        return $this->hasMany('App\Orders', 'customer_id')->where('completed', 0);
    }

    /**
        User associated with this customer
    */
    public function user(){
        return $this->belongsTo('app\User', 'id');
    }
}
