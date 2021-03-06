<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    protected $fillable = ['title', 'description'];

    public function users()
    {
        return $this->belongsToMany('App\User', 'lessons', 'category_id', 'user_id');
    }

    public function question()
    {
        return $this->hasMany('App\Question');
    }

    public function lessons()
    {
        return $this->hasMany('App\Lesson');
    }
}
