<?php

namespace App\Listeners;

use App\Events\OrderWasSubmitted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use Mail;
use App\Restaurant;
use App\Orders;
use App\Item;
use App\Customer;
use App\Option;
use App\OptionChoice;
use DB;

/**
 * This Event listener
 * responds when an OrderwasSubmitted event is fire
 * when a customer makes an order
 * this listener sends all the appropriate emails including: order summaries,
 * a request for ratings/feedback
    */
class OrderConfirmation
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderWasSubmitted  $event
     * @return void
     */
    public function handle(OrderWasSubmitted $event)
    {


        $orderparam=$event->order->first();
        $orderset=$event->order;
        $customer = User::find($orderparam->customer_id);

        $restaurant=Restaurant::find($orderparam->restaurant_id);

         $restaurantUser=User::find($orderparam->restaurant_id);

        Mail::send('email.orderconfirmation',['order'=>$orderset,'customer'=>$customer,'restaurant'=>$restaurant], function($message) use ($customer){
        $message->to($customer->email)->subject('Your Order has been processed');
        });
        Mail::send('email.ratingrequest',['order'=>$orderparam,'customer'=>$customer,'restaurant'=>$restaurant], function($message) use ($customer){
		$message->to($customer->email)->subject($customer->name."".' Will You Rate Your Experience At J3Foods?');
		});
        Mail::send('email.ordernotification',['order'=>$orderset,'customer'=>$customer,'restaurant'=>$restaurant], function($message) use ($restaurantUser){
        $message->to($restaurantUser->email)->subject('New Order has been submitted');
        });
    }


}
