<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use Laracasts\Flash\FlashServiceProvider;

class UserController extends Controller
{

    public function index(){
        $users = User::orderBy('id','asc')->paginate(5);
        $categories = Category::orderBy('id','asc')->paginate(5);
        return view('admin')->with('users',$users)->with('categories',$categories);
    }

    public function create()
    {
        return view('register');
    }
    public function store(Request $request)
    {
        //dd($request->all());
        $user = new User();
        $user->name = $request->name;
        $user->apellidos = $request->apellidos;
        $user->nick = $request->nick;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        flash('Bienvenido a bordo!','success');

        return redirect()->route('users.index');
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('editprofile')->with('user',$user);
    }

    public function update(Request $request,$id)
    {
            $user = User::find($id);
            $user->name = $request->name;
            $user->apellidos = $request->apellidos;
            $user->nick = $request->nick;
            $user->email = $request->email;
            $user->tipo = $request->type;
            $user->save();

            flash('El usuario '.$user->name.' '.$user->apellidos.' ha sido editado con exito !!','success');
            return redirect()->route('users.index');
    }
    /*
    *
    *
    * antes
    *
    */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        flash('El usuario ha sido borrado de la BBDD', 'danger');
        return redirect()->route('users.index');
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
