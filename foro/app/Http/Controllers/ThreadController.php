<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Thread;
use App\User;
use App\Message;
use App\Image;
use Illuminate\Support\Facades\Redirect;
use Laracast\Flash\Flash;
use App\Http\Requests\ThreadRequest;
use Illuminate\Support\Facades\Input;

class ThreadController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id','asc')->paginate(4);
        $categories = Category::orderBy('id','asc')->paginate(4);
        $dir = Input::get('dir');
        if($dir == 'desc')
        {
            $threads = Thread::orderBy('id' ,'desc')->paginate(5);
        }else
        {
            $threads = Thread::orderBy('id','asc')->paginate(5);
        }
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
    public function createByMemeber()
    {
        $categories = Category::OrderBy('titulo','ASC')->pluck('titulo','id');
        return view('admin.threads.create')->with('categories',$categories);
    }

    public function frame()
    {
        $users = User::orderBy('id','asc')->paginate(4);
        $categories = Category::orderBy('id','asc')->paginate(4);
        $dir = Input::get('dir');
        if($dir == 'desc')
        {
            $threads = Thread::orderBy('id' ,'desc')->paginate(5);
        }else
        {
            $threads = Thread::orderBy('id','asc')->paginate(5);
        }
        $threads->each(function($threads)
        {
            $threads->category;
            $threads->user;
            $threads->messages;
        });
        $messages = Message::orderBy('id', 'asc')->paginate(4);
        $images = Image::orderBy('id','asc')->paginate(5);

        //dd($threads);
        return view('admin.threads.index', compact('images'))->with('threads',$threads)->with('users',$users)->with('categories',$categories)->with('messages', $messages)->with('images', $images);
    }

    public function create()
    {
        $categories = Category::OrderBy('titulo','ASC')->pluck('titulo','id');
        return view('admin.threads.create')->with('categories',$categories);
    }

    public function store(ThreadRequest $request)
    {
        $thread = new Thread();
        $thread->descripcion = $request->descripcion;
        $thread->num_mensajes = 0;
        $thread->category_id = $request->category_id;
        $thread->user_id = \Auth::user()->id;
        $thread->save();
        flash('El hilo ha sido creado con exito', 'success');
        return redirect()->action('ThreadController@show', ['id' => $thread->id]);  
    }
    public function edit($id) {
        $categories = Category::OrderBy('titulo','ASC')->pluck('titulo','id');
        $thread = Thread::find($id);
        return view('admin.editthread')->with('thread',$thread)->with('categories',$categories);
    }

    public function update(Request $request,$id)
    {
        //dd($request);
        $thread = Thread::find($id);
        $thread->descripcion = $request->descripcion;
        $thread->num_mensajes = $thread->num_mensajes;
        $thread->category_id = $request->category_id;
        $thread->user_id = \Auth::user()->id;
        $thread->save();
        flash('El hilo ha sido editado con exito', 'success');
        return redirect()->route('thread.index');
    }

    public function destroy($id)
    {
        $thread = Thread::find($id);
        $thread->delete();
        flash('El hilo ha sido borrado de la BBDD', 'danger');
        return redirect()->action('CategoryController@show', ['id' => $thread->category_id]);
    }
    
    public function show($id)
    {
        $thread = Thread::find($id);
        $messages = Message::where('thread_id', $thread->id)->paginate(20);
        return view('messagespage')->with('thread',$thread)->with('messages',$messages);
    }
}
