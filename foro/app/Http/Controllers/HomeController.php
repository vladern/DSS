<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Thread;
use App\Image;


class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id','asc')->paginate(7);
        $threads = Thread::orderBy('num_mensajes','desc')->paginate(7);
        $threads->each(function($threads)
        {
            $threads->category;
            $threads->user;
            $threads->messages->first();
        });

        //$id = 6;
        //$images = Image::find($id);

        //dd($threads);
        return view('welcome')->with('threads',$threads)->with('categories',$categories);
    }
}
