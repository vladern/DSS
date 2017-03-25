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

    public static function getCategories(){
        $allCategories = Category::All();
        return $allCategories;
    } 

    public static function createCategory($title) {
    	$category = new Category;
    	$category->titulo = $title;
    	$category->save();
    }

    public static function modifyCategory($titulo_old, $titulo_new) {
        $category = Category::where('titulo', '=', $titulo_old)->firstOrFail();
        $category->titulo = $titulo_new;
        $category->save();
    }

    public static function deleteCategory($titulo) {
        $category = Category::where('titulo', '=', $titulo)->firstOrFail();
        $category->delete();
    }

}
