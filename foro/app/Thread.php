<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    public $timestamps = false;

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function messages() {
        return $this->hasMany('App\Message');
    }

    public function users() {
        return $this->belongsTo('App\User');
    }
}
