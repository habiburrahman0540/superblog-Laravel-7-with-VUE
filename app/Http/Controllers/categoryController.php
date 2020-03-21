<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function add_category(Request $request){
        $this->validate($request,[
            'cat_name'=> 'required|min:3|max:100|'
        ]);
        $category = new Category();
        $category->cat_name = $request->cat_name;
        $category->save();
        return ['message'=>'ok'];
    }
    public function all_category(){
       $categories = Category::all();
       return response()->json([
           'categories' => $categories,
       ],200); 
    }
    public function delete_category($id){
        $category = Category::find($id);
        $category->delete();
    }
    public function edit_category($id){
        $category = Category::find($id);
        return response()->json([
            "category"=>$category
        ]);
    }
    public function update_category(Request $request,$id){
        $this->validate($request,[
            'cat_name'=> 'required|min:3|max:100|'
        ]);
        $category = Category::find($id);
        $category->cat_name = $request->cat_name;
        $category->save();
    }
}
