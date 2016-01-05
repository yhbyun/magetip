<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Query the user's social profile.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile()
    {
        return $this->hasOne('App\Profile');
    }

    /**
     * Query the tricks that the user has posted.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tricks()
    {
        return $this->hasMany('App\Trick');
    }

    /**
     * Query the votes that are casted by the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function votes()
    {
        return $this->belongsToMany('App\Trick', 'votes');
    }

    /**
     * Get the user's avatar image.
     *
     * @return string
     */
    public function getPhotocssAttribute()
    {
        if($this->photo) {
            return url('img/avatar/' . $this->photo);
        }

        return Gravatar::src($this->email, 100);
    }

    /**
     * Check user's permissions
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->is_admin === true;
    }
}
