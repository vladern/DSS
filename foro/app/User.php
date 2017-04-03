<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function messages() 
    {
        return $this->hasMany('App\Message');
    }

    public function threads() 
    {
        return $this->hasMany('App\Thread');
    }

    public function categories() 
    {
        return $this->hasMany('App\Category');
    }

    public function image() 
    {
        return $this->hasOne('App\Image');
    }

    public static function getCategories(){
            $allCategories = Category::All();
            return $allCategories;
    } 

    public static function currentUser($id){
        return User::find($id);
    }
}
