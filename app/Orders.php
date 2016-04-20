<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';//this is the name of the table that this model is linked to if the table name is different change the value
    protected $primaryKey = 'order_id';
	protected $fillable = ['submit_time','completed','quantity','special_instructions','item_id','restaurant_id', 'customer_id'];
	public $timestamps = false;

    /**
        Restaurant this order is to
    */
    public function restaurant(){
    	return $this->belongsTo(Restaurant::class);
    }

    /**
        Customer this order belongs to
    */
    public function customer(){
    	return $this->belongsTo(Customer::class,'customer_id');
    }

    /**
        User this order belongs to
    */
    public function user(){
    	return $this->belongsTo(User::class,'customer_id');
    }

    /**
        Item in this order
    */
    public function item(){
    	return $this->belongsTo(Item::Class, 'item_id');
    }

}
