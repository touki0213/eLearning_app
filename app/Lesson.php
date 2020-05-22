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
}