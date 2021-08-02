<?php

namespace App\Models;

class Tag extends Model
{
    /**
     * Posts that belong to the tag.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
