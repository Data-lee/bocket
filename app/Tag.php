<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
     /**
     * Get the user that owns the tag.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * The tags that belong to the bookmark.
     */
    public function bookmarks()
    {
        return $this->belongsToMany('App\Bookmark')->withTimestamps();
    }
}
