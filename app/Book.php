<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title', 'cover_url', 'synopsis', 'created_at', 'updated_at', 'user_id',
    ];
    
    public function author() {
        # Book belongs to Author
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('App\User', "id");
    }

    public function chapters() {
        return $this->hasMany('App\Chapter');
    }

    public function followers() {
        return $this->belongsToMany('App\User')->withTimestamps();
    }
}
