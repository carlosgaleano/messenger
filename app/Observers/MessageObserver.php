<?php

namespace App\Observers;

use App\Message;
use App\Conversation;

class MessageObserver
{
    /**
     * Handle the Message "created" event.
     *
     * @param  \App\Message  $message
     * @return void
     */
    public function created(Message $message)
    {
        $conversation= Conversation::where('user_id', $message->from_id)
                             ->where('contact_id', $message->to_id)->first();
    }

}
