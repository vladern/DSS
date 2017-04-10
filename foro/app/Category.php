<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    
    use Sluggable;
    public function sluggable()
    {
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
        return [
            'slug' => [
                'source' => 'titulo'
            ]
        ];
    }
    protected $table = 'categories';
    protected $fillable = ['titulo','user_id'];

    public $timestamps = false;

    public function threads() 
    {
        return $this->hasMany('App\Thread');
    }


    public function user() {
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
