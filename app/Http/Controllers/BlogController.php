<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

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
    public function all_post_by_category_id($id){
        $postbycatid = Post::with('user','category')->where('cat_id',$id)->orderBy('id','desc')->get();
        return response()->json([
            'postbycat'=>$postbycatid 
        ]);

    }
    public function searchpost(){
        $search = \Request::get('search');
        $Searchpost = Post::with('user','category')
                    ->where('title','LIKE',"%$search%")
                    ->orWhere('description','LIKE',"$search")
                    ->get();
        return response()->json([
            "posts"=> $Searchpost
        ]);
    }
}
