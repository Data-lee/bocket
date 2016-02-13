<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
     /**
     * Get the user that owns the bookmark.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * The bookmarks that belong to the tag.
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}


