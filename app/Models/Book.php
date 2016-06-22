<?php

namespace App\Models;

use App\Events\Book\BookWasCreated;
use App\Events\Book\BookWasUpdated;
use App\Events\Book\BookWasDeleted;

use Illuminate\Database\Eloquent\Model;

class Book extends BaseModel {

    protected $fillable = ['title', 'author_id', 'cover_url'];

    public static function boot() {

        parent::boot();

        // When a book is created
        static::created(function($book) {
            event(new BookWasCreated($book));
        });

        // When a book is updated
        static::updated(function($book) {
            return dd($book);
            event(new BookWasUpdated($book));
        });

        // When a book is updated
        static::deleted(function($book) {
            event(new BookWasDeleted($book));
        });
    }

}
