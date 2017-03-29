<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class ThreadController extends Controller
{
    public function index()
    {
        return view('admin.threads.index');
    }
    public function create()
    {
        $categories = Category::OrderBy('titulo','ASC')->pluck('titulo','id');
        return view('admin.threads.create')->with('categories',$categories);
    }
    public function edit()
    {

    }
    public function destroy()
    {

    }
}
