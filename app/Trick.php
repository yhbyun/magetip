<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trick extends Model
{
    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [ 'tags', 'categories', 'user' ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['last_updated_at'];

    /**
     * Query the tricks' votes.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function votes()
    {
        return $this->belongsToMany('App\User', 'votes');
    }

    /**
     * Query the user that posted the trick.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Query the tags under which the trick was posted.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    /**
     * Query the categories under which the trick was posted.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
}
