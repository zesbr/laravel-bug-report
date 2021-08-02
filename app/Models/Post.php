<?php

namespace App\Models;

class Post extends Model
{
    /**
     * Tags that belong to the post.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
