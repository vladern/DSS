<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
<<<<<<< HEAD
    //protected $table = 'Category';
=======
>>>>>>> ramaJorge
    public $timestamps = false;

    public function threads() {
        return $this->hasMany('App\Thread');
    }
}
