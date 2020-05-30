<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'lessons', 'user_id', 'category_id');
    }

    public function following()
    {
        return $this->belongsToMany('App\User', 'relationships', 'follower_id', 'followed_id');
    }

    public function followers()
    {
        return $this->belongsToMany('App\User', 'relationships', 'followed_id', 'follower_id');
    }

    public function is_following($followed_id)
    {
        if($this->following()->where('followed_id', $followed_id)->count() > 0){
            return true;
        } else {
            return false;
        }
    }

    public function relationships()
    {
        return $this->hasMany('App\Relationship');
    }

    public function lessons()
    {
        return $this->hasMany('App\Lesson');
    }

    public function activities()
    {
        return $this->hasMany('App\Activity');
    }
}
