<?php

namespace App\Listeners;

/**
 * Event subscribers are classes that may subscribe to multiple events from within the class itself,
 * allowing you to define several event handlers within a single class.
 * Subscribers should define a subscribe method, which will be passed an event dispatcher instance:
 *
 * This Class will listen to all events related to book
 *
 * Class BookEventListener
 * @package App\Listeners
 */
class BookEventListener
{

    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'App\Events\Book\BookWasCreated',
            'App\Listeners\BookEventListener@onBookWasCreated'
        );

        $events->listen(
            'App\Events\Book\BookWasUpdated',
            'App\Listeners\BookEventListener@onBookWasUpdated'
        );
    }


    /**
     * Handle book created events
     *
     */
    public function onBookWasCreated($event) {

        // do things when a new book is created

    }

    /**
     * Handle book updated events
     *
     */
    public function onBookWasUpdated($event) {

        // do things when a book is updated

        dd($event);

    }


}