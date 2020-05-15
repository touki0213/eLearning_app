<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lesson extends Model
{
    //

    protected $fillable = ['completed'];

    public function user()
    {
        return $this->hasMany('App\Lesson', 'users', 'id');
    }

    public function cotegory()
    {
        return $this->hasMany('App\Lesson', 'categories', 'id');
    }
}