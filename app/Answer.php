<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //

    protected $fillable = ['choice_id', 'lesson_id'];

    public function choice()
    {
        return $this->belongsTo('App\Choice');
    }

    public function isCorrect()
    {
        return $this->choice->is_correct;
    }

    public function correctAnswer()
    {
        return $this->choice->question->choices->where('is_correct', 1)->first();
    }
}
