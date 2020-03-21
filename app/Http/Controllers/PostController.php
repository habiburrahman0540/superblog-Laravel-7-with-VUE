<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Auth;
use Image;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function all_post(){
        $posts = Post::with('user','category')->orderBy('id','desc')->get();
       
        return response()->json([
            'posts'=>$posts
        ],200);
    }
    public function save_post(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required',
            'cat_id'=>'required',
            'photo'=>'required',
        ]);
       $strpos = strpos($request->photo,';');
       $sub = substr($request->photo,0,$strpos);
        $ext = explode('/',$sub)[1];
        $name=time().".".$ext;
        $uploadpath = public_path()."/uploadimage/";
        $img= Image::make($request->photo)->resize(1080,850);
        $img->save( $uploadpath.$name);
       $post = new Post();
        $post->title =$request->title;
        $post->description =$request->description;
        $post->cat_id =$request->cat_id;
        $post->user_id = Auth::user()->id;
        $post->photo =$name;
        $post->save();
     }
     public function delete_post($id){
            $post = Post::find($id);
            $imagepath= public_path()."/uploadimage/";
            $image = $imagepath.$post->photo;
            if(file_exists($image)){
                @unlink($image);
            }
            $post->delete();
     }
     public function edit_post($id){
                $post = Post::find($id);
                return response()->json([
                    'post'=>$post
                ],200);
     }
     public function update_post(Request $request ,$id){
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required',
            'cat_id'=>'required',
            'photo'=>'required',
        ]);
        $post=Post::find($id);
        if($request->photo != $post->photo){
            $strpos = strpos($request->photo,';');
       $sub = substr($request->photo,0,$strpos);
        $ext = explode('/',$sub)[1];
        $name=time().".".$ext;
        $uploadpath = public_path()."/uploadimage/";
        $img= Image::make($request->photo)->resize(1080,850);
        $image =$uploadpath.$post->photo;
        $img->save( $uploadpath.$name);
        
        if(file_exists($image)){
            @unlink($image);
        }
        }else{
            $name = $post->photo;
        }
        $post->title =$request->title;
        $post->description =$request->description;
        $post->cat_id =$request->cat_id;
        $post->user_id = Auth::user()->id;
        $post->photo =$name;
        $post->save();
     }
}
