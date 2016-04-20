<?php

namespace App\Events;

use App\Orders;
use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;


/**
  * This Event is linked to the
  * OrderConfirmation listener
  * which sends the relevant emails once an
  * order has been submitted
 */
class OrderWasSubmitted extends Event
{
    use SerializesModels;

    public $order;//collection of order objects
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order=$order;
        //
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
