<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    protected $table = 'messages';
    protected $fillable = ['texto','fecha','thread_id','user_id'];

    public $timestamps = true;

    public function thread() {
        return $this->belongsTo('App\Thread');
    }

    public function users() {
        return $this->belongsTo('App\User');
    }
}
