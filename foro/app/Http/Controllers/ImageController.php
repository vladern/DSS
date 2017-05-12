<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Thread;
use App\User;
use App\Message;
use App\Image;
use Laracasts\Flash\FlashServiceProvider;
use App\Http\Requests\CategoryRequest;


class ImageController extends Controller
{
    public function index(Request $request){

        $users = User::orderBy('id','asc')->paginate(4);
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

     public function create(){
        return view('admin.files.create');
     }

    public function store(Request $request) {
        
        $this->validate($request, [
            'nombre' => 'required',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $image = new Image($request->input()) ;
     
         if($file = $request->hasFile('imagen')) {
            
            $file = $request->file('imagen') ;
            
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/images/' ;
            $file->move($destinationPath,$fileName);
            $image->imagen = $fileName ;
            $image->ruta = $destinationPath;
            $image->message_id = 1;
            $image->user_id = \Auth::user()->id;
        }
        $image->save() ;

         flash('La imagen se ha subido correctamente','success');
         return redirect()->route('/');
    }

    public function destroy($id)
    {
        $img = Image::find($id);
        $img->delete();
        flash('La foto ha sido borrada', 'danger');
        return redirect()->route('images.index');
    }

    public function show()
    {
        return redirect()->route('images.index');
    }
    
}
