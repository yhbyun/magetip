<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Query the tricks that belong to the category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tricks()
    {
        return $this->belongsToMany('App\Trick');
    }
}
