<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public $timestamps = false;

    public function thread() {
        return $this->belongsTo('App\Thread');
    }

    public function users() {
        return $this->belongsTo('App\User');
    }
}
