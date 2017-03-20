<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

    public function threads() 
    {
        return $this->hasMany('App\Thread');
    }


    public function users() {
        return $this->belongsTo('App\User');
    }

      public static function getCategories(){
            $allCategories = Category::All();
            return $allCategories;
    } 

    public static function createCategory($title) {
    	$category = new Category;
    	$category->titulo = $title;
    	$category->save();
    }
}
