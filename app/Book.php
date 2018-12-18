<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Book extends Model
{
    protected $fillable = [
        'title', 'cover_url', 'synopsis', 'created_at', 'updated_at', 'user_id',
    ];
    
    public function user() {
        # Book belongs to Author
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('App\User');
    }

    public function chapters()
    {
        # With timetsamps() will ensure the pivot table has its created_at/updated_at fields automatically maintained
        return $this->belongsToMany('App\Chapter');
    }
}
