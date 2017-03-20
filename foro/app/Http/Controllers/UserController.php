<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    public function index(){
        return view('register');
    }

    public function getUsers(){
            $allUsers = User::simplePaginate(2);
            return $allUsers;
    }
    
    public function createUser(Request $request){

            $user = new User;
            $user->name = $request->first_name;
            $user->apellidos = $request->last_name;
            $user->nick = $request->nick;
            $user->email = $request->email;
            $user->password = $request->password;
            if($request->password==$request->password_confirmation){
                    $user->save();
                    echo ("Usuario guardado");
            }
            else {
                echo ("Las cotraseñas no coinciden");
            }
    }


    public static function deleteUser($mail){

            $aBorrar = User::where('email', '=', $mail)->firstOrFail();
            $aBorrar->delete();
    }

    public static function modifiyUser($old_value, $new_value){

        


    }

    public function isAdmin() {
        $resultado = false;
        if (tipo == "admin") {
            $resutado = true;
        }
        return resultado;
    }
}
