<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    //

    protected $fillable = ['text', 'is_correct', 'question_id'];

    public function question()
    {
        return $this->belongsTo('App\Question');
    }

    public function lessons()
    {
        return $this->belongsToMany('App\Lesson', 'answers', 'choice_id', 'lesson_id');
    }

    public function answers()
    {
        return $this->hasMany('App\Answer');
    }
}
