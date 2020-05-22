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
        // return $this->belongsToMany('App\Category', 'questions', 'category_id');
        return $this->hasMany('App\Question');
    }
}
