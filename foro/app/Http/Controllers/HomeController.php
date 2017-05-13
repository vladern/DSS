<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Thread;
use App\Image;
use App\User;
use App\Message;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::orderBy('id','asc')->paginate(10);
        $messages = Message::all();

            if ($request->descripcion == NULL) {
                $threads = Thread::orderBy('num_mensajes','desc')->paginate(10);
            }
            else {
                $threads = Thread::search($request->descripcion)->orderBy('num_mensajes','desc')->paginate(10);           
            }
        
        $users = User::all();
        $threads->each(function($threads)
        {
            $threads->category;
            $threads->user;
            $threads->messages->first();
        });

        //$id = 6;
        //$images = Image::find($id);

        //dd($threads);
        return view('welcome')->with('threads',$threads)->with('categories',$categories)->with('numUsers',count($users))->with('numMess',count($messages))->with('numThr',count($threads));
    }

    public function recent()
    {
        $categories = Category::orderBy('id','asc')->paginate(10);
        $messages = Message::all();
        $threads = Thread::orderBy('created_at','desc')->paginate(10);
        
        $users = User::all();
        $threads->each(function($threads)
        {
            $threads->category;
            $threads->user;
            $threads->messages->first();
        });

        return view('welcome')->with('threads',$threads)->with('categories',$categories)->with('numUsers',count($users))->with('numMess',count($messages))->with('numThr',count($threads));
    }

    public function old()
    {
        $categories = Category::orderBy('id','asc')->paginate(10);
        $messages = Message::all();
        $threads = Thread::orderBy('created_at','asc')->paginate(10);
        
        $users = User::all();
        $threads->each(function($threads)
        {
            $threads->category;
            $threads->user;
            $threads->messages->first();
        });

        return view('welcome')->with('threads',$threads)->with('categories',$categories)->with('numUsers',count($users))->with('numMess',count($messages))->with('numThr',count($threads));
    }
}
