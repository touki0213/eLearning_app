<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //

    protected $fillable = ['text', 'category_id'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function choices()
    {
        return $this->hasMany('App\Choice');
    }
}
