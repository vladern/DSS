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

class CategoryController extends Controller
{


    public function index()
    {
        $users = User::orderBy('id','asc')->paginate(4);
        $categories = Category::orderBy('id','asc')->paginate(100);
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
        return view('categorypage', compact('images'))->with('threads',$threads)->with('users',$users)->with('categories',$categories)->with('messages', $messages)->with('images', $images);
    }

    public function frame()
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
        $images = Image::orderBy('id','asc')->paginate(5);
        //dd($threads);
        return view('admin.tabCategories', compact('images'))->with('threads',$threads)->with('users',$users)->with('categories',$categories)->with('messages', $messages)->with('images', $images);
    }

   public function store(CategoryRequest $request)
    {
        //dd($request->all());
        $category = new Category();
        $category->titulo = $request->titulo;
        $category->user_id = \Auth::user()->id;
        $category->save();

        flash('Nueva Categoria creada con exito !','success');
        
        return redirect()->route('categories.index');
    }

    public function edit($id) {
        $category = Category::find($id);
        return view('admin.editcategory')->with('category',$category);
    }


    public function update(Request $request,$id) 
    {
        //dd('No hay nada por el momento');
        $category = Category::find($id);
        $category->titulo = $request->titulo;
        $category->user_id = \Auth::user()->id;
        $category->save();
        flash('La categoria ha sido editada con exito', 'danger');
        return redirect()->route('categories.index');
    }

    public function destroy($id)
   	{
        $category = Category::find($id);
        $category->delete();
        flash('La categoría ha sido borrada de la BBDD', 'danger');
        return redirect()->route('categories.index');
    }

    public function show($id){
        $category = Category::find($id);
        $threads = Thread::where('category_id', $category->id)->paginate(5);
        return view('threadspage')->with('category',$category)->with('threads',$threads);
    } 
}
