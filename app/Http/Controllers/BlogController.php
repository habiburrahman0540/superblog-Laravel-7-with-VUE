<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function all_blog_posts(){
        $posts = Post::with('user','category')->orderBy('id','desc')->get();
       
        return response()->json([
            'posts'=>$posts
        ],200);
    }
    public function get_blog_post_by_id($id){
        $post = Post::with('user','category')->where('id',$id)->first();
        return response()->json([
            'post'=>  $post 
        ]);
    }
    public function allcategory(){
        $allcategory = Category::all();
        return response()->json([
            'allcategory'=> $allcategory
        ]);
    }
}
