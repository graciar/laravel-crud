<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all(['id', 'name'])->sortBy('id');
        
        return view("cat/index", ["categories" => $categories]);
    }

    public function add(){
        return view("cat/form");
    }

    public function update(string $id){
        $category = Category::find($id);
        return view("cat/form", ["category"=>$category]);
    }

    public function save(Request $request){
        if (isset($request->id)) {  // use existing
            $category = Category::find($request->id);
        } else {
            $category = new Category();  // create a new one
        }

        $category->name = $request->category;
        $category->save();
        return redirect("/cat");
    }

    public function delete(Request $request) {
       if ($request->method() == "POST") {
           Category::find($request->id)->delete();
           return redirect("/cat");
       } else {
           $category = Category::find($request->id);
           return view("cat/delete", ["category" => $category]);
       }
   }

}
