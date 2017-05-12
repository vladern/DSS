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
    public function index()
    {
        $categories = Category::orderBy('id','asc')->paginate(10);
        $threads = Thread::orderBy('num_mensajes','desc')->paginate(10);
        $messages = Message::all();
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
}
