<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lesson extends Model
{
    //

    protected $fillable = ['category_id', 'user_id', 'completed'];

    public function choices()
    {
        return $this->belongsToMany('App\Choice', 'answers', 'lesson_id', 'choice_id');
    }

    public function answers()
    {
        return $this->hasMany('App\Answer');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}