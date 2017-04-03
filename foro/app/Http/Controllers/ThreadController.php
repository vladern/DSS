<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Thread;
use App\User;
use App\Message;
use Illuminate\Support\Facades\Redirect;
use Laracast\Flash\Flash;
use App\Http\Requests\ThreadRequest;

class ThreadController extends Controller
{
    public function index()
    {
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
        //dd($threads);
        return view('admin.admin')->with('threads',$threads)->with('users',$users)->with('categories',$categories)->with('messages', $messages);
    }

    public function create()
    {
        $categories = Category::OrderBy('titulo','ASC')->pluck('titulo','id');
        return view('admin.threads.create')->with('categories',$categories);
    }

    public function store(ThreadRequest $request)
    {
        //dd($request);
        $thread = new Thread();
        $thread->descripcion = $request->descripcion;
        $thread->num_mensajes = 0;
        $thread->category_id = $request->category_id;
        $thread->user_id = \Auth::user()->id;
        $thread->save();
        flash('El hilo ha sido creado con exito', 'success');
        return redirect()->route('thread.index');
        
    }

    public function edit(Request $request)
    {
        //dd($request);
        $thread = new Thread();
        $thread->descripcion = $request->descripcion;
        $thread->num_mensajes = 0;
        $thread->category_id = $request->category_id;
        $thread->user_id = \Auth::user()->id;
        $thread->save();
        flash('El hilo ha sido editado con exito', 'danger');
        return redirect()->route('thread.index');
    }

    public function destroy($id)
    {
        $thread = Thread::find($id);
        $thread->delete();
        flash('El hilo ha sido borrado de la BBDD', 'danger');
        return redirect()->route('thread.index');
    }
    
    public function show()
    {
        return redirect()->route('thread.index');
    }
}
