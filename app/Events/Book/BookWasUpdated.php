<?php

namespace App\Events\Book;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Models\Book;

class BookWasUpdated extends Event
{
    use SerializesModels;
    
    public $book;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Book $book)
    {
        $this->book = $book;        
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
