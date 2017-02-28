<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'Messaje';
    public $timestamps = false;

    public function thread() {
        return $this->belonsTo('App\Thread');
    }

}
