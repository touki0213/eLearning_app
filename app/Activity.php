<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    //
    protected $fillable = ['user_id', 'relationship_id', 'lesson_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function lesson()
    {
        return $this->belongsTo('App\Lesson');
    }

    public function relationship()
    {
        return $this->belongsTo('App\Relationship');
    }

}
