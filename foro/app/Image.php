<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    public $fillable = ['nombre'];
    
    public function user() {

        return $this->belongsTo('App\User');
    }

    public function message() {

        return $this->belongsTo('App\Message');
    }
}
