<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $fillable = [
        'name', 'content', 'book_id', 'created_at', 'updated_at','order'
    ];
    public function book() {
        # Chapter belongs to Book
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('App\Book');
    }
}
