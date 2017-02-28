<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $table = 'Thread';
    public $timestamps = false;

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function messajes() {
        return $this->hasMany('App\Messaje');
    }
}
