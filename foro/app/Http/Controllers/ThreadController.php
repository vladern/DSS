<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Thread;
use Illuminate\Support\Facades\Redirect;
use Laracast\Flash\Flash;

class ThreadController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id','asc');
        $threads = Thread::orderBy('id','asc');
        return view('admin.threads.index')->with('threads',$threads)->with('categories',$categories);
    }
    public function create()
    {
        $categories = Category::OrderBy('titulo','ASC')->pluck('titulo','id');
        return view('admin.threads.create')->with('categories',$categories);
    }
    public function store(Request $request)
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
}
