<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Thread;
use App\User;
use App\Message;
use App\Image;
use Laracasts\Flash\FlashServiceProvider;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    //aqui hay que descomentar lo comentado y comentar la linea de abajo tambien hay que quitar el request
    public function index(Request $request){
        if ($request->email == NULL && $request->name == NULL) {
            $users = User::orderBy('id','asc')->paginate(5);
        }
        else {

            if ($request->name != NULL) {
                $users = User::search($request->name)->orderBy('id','asc')->paginate(100);
            }

            else {
                $users = User::email($request->email)->orderBy('id','asc')->paginate(100);
            }
            
        }
        $categories = Category::orderBy('id','asc')->paginate(4);
        $threads = Thread::orderBy('id','asc')->paginate(5);
        $threads->each(function($threads)
        {
            $threads->category;
            $threads->user;
            $threads->messages;
        });
        $messages = Message::orderBy('id', 'asc')->paginate(4);
        $images = Image::orderBy('id','asc')->paginate(5);
        //dd($threads);
        return view('admin.admin', compact('images'))->with('threads',$threads)->with('users',$users)->with('categories',$categories)->with('messages', $messages)->with('images', $images);
    }
    public function show()
    {
        return view('admin.login');
    }

    public function create()
    {
        return view('admin.register');
    }

    public function store(UserRequest $request)
    {
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
        return view('admin.editprofile')->with('user',$user);
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

    public function buscar(Request $request) {
        $users = User::search($request->name)->orderBy('id','DESC')->paginate(5);
        return view('admin.admin')->with('users',$users);
    }


    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        flash('El usuario ha sido borrado de la BBDD', 'danger');
        return redirect()->route('categories.index');
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
