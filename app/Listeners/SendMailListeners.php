<?php

namespace App\Listeners;

use App\Models\UserContract;
use Illuminate\Mail\Events\MessageSent;

class SendMailListeners
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
     * @param  MessageSent  $event
     * @return void
     */
    public function handle(MessageSent $event)
    {
        if (isset($event->message->userContract)) {
            $event->message->userContract->is_sign = "1";
            $event->message->userContract->save();
        }
    }
}
