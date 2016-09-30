<?php

namespace App\Listeners\Social;

use Mail;
use App\Events\Social\TwitterAccountWasLinked;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\Social\TwitterAccountLinked;

class SendTwitterLinkedEmail
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
     * @param  GitHubAccountWasLinked  $event
     * @return void
     */
    public function handle(TwitterAccountWasLinked $event)
    {
        Mail::to($event->user)->send(new TwitterAccountLinked($event->user));
    }
}
