<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\User;
use Laracasts\Flash\FlashServiceProvider;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{


    public function index()
    {
        $users = User::orderBy('id','asc')->paginate(4);
        $categories = Category::orderBy('id','asc')->paginate(4);
        return view('admin.admin')->with('users',$users)->with('categories',$categories);
    }

   public function createCateogry() {

   }

   public function store(CategoryRequest $request)
    {
        //dd($request->all());
        $category = new Category();
        $category->titulo = $request->titulo;
        $category->user_id = 1;
        $category->save();

        flash('Nueva Categoria creada con exito !','success');

        return redirect()->route('categories.index');
    }

    public function edit() 
    {
        dd('No hay nada por el momento');
    }

    public static function modifyCategory(Request $request,$id) {
    	$category = Category::find($id);
        $category->titulo = $request->titulo;
        $category->save();
    }

    public function destroy($id)
   	{
        $category = Category::find($id);
        $category->delete();
        flash('La categoría ha sido borrada de la BBDD', 'danger');
        return redirect()->route('categories.index');
    }

    public function getCategories(){
        $allCategories = Category::All();
        return $allCategories;
    } 
}
