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
        'name','apellidos', 'email', 'password','tipo'
    ];

    public function scopeBuscar($query,$name,$apellidos)
    {
        if($name != "" and $apellidos != "")
        {
            $query->where('name','like',$name);
            $query->where('apellidos','like',$apellidos);
        }else if($name!="")
        {
            $query->where('name','like',$name);
        }else if($apellidos!="")
        {
            $query->where('apellidos','like',$apellidos);
        }
        
    }
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

    public function scopeSearch($query, $name) {
        return $query->where('name','LIKE',"%$name%");
    }

    public function scopeEmail($query, $email) {
        return $query->where('email','LIKE',"%$email%");
    }

}
