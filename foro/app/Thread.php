<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
<<<<<<< HEAD
    //protected $table = 'Thread';
=======
>>>>>>> ramaJorge
    public $timestamps = false;

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function messages() {
        return $this->hasMany('App\Message');
    }
}
