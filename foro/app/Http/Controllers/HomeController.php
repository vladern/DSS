<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Thread;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id','asc')->paginate(7);
        $threads = Thread::orderBy('id','asc')->paginate(7);
        $threads->each(function($threads)
        {
            $threads->category;
            $threads->user;
            $threads->messages;
        });
        //dd($threads);
        return view('welcome')->with('threads',$threads)->with('categories',$categories);
    }
}
