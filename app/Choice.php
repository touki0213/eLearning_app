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
}
