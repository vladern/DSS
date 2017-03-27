<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\User;
use Laracasts\Flash\FlashServiceProvider;

class CategoryController extends Controller
{


	public function index(){
        $users = User::orderBy('id','asc')->paginate(5);
        $categories = Category::orderBy('id','asc')->paginate(5);
        $selection0 = '"active"';
        $selection1 = '';
        return view('admin.admin')->with('users',$users)->with('categories',$categories)->with('select0',$selection1)->with('select1',$selection0);
    }

   public function createCateogry() {

   }

   public function store(Request $request)
    {
        //dd($request->all());
        $category = new Category();
        $category->titulo = $request->titulo;
        $category->user_id = 1;
        $category->save();

        flash('Nueva Categoria creada con exito !','success');

        return redirect()->route('categories.index');
    }

    public function editCategory() {

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
