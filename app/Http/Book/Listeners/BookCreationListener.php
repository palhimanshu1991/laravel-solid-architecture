<?php

namespace App\Listeners;

use App\Events\BookWasCreated;

class BookCreationListener
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
     * @param BookWasCreated $event
     *
     * @return void
     */
    public function handle(BookWasCreated $event)
    {
        //
    }
}
