<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * Query the tricks that belong to the tag.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tricks()
    {
        return $this->belongsToMany('App\Trick');
    }
}
