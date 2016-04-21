<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model {

    protected $fillable = ['title', 'author_id', 'cover_url'];

}
