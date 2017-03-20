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

    public static function getUsers(){

            $allUsers = User::simplePaginate(2);
            return $allUsers;
    }

    public static function getUsers(){
            $allUsers = User::simplePaginate(2);
            return $allUsers;
    }
    public static function createUser($nombre, $nick, $mail, $apellidos){

            $user = new User;
            $user->name = $nombre;
            $user->apellidos = $apellidos;
            $user->nick = $nick;
            $user->email = $mail;
            $user->save();
    }


    public static function deleteUser($mail){

            $aBorrar = User::where('email', '=', $mail)->firstOrFail();
            $aBorrar->delete();

    public function isAdmin() {
        $resultado = false;
        if (tipo == "admin") {
            $resutado = true;
        }
        return resultado;

    }
}
