<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class TourQuoteEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

       
    public function __construct()
    {
        //
    }
   
    public function broadcastOn()
    {
        return new Channel('tourQuoteCount');
    }
    public function broadcastWith(){
        

        return [
            'qt_new' => 120,
            'qt_in_pc' => 10,
            'qt_pending' => 10,
            'qt_confirm' => 10         
                       
        ];
    }
}
