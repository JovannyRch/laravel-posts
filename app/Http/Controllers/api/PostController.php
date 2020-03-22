<?php

namespace App\Http\Controllers\api;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index(){
        $posts = Post::
        join('post_images','post_id','=','posts.id')->
        join('categories','category_id','=','posts.id')->
        select("posts.id","posts.title","categories.titulo as category","post_images.image")->
        paginate(10);
        
        return response()->json($posts);
    }

    public function show(Post $post){
        $post->image = $post->image->image;
        $post->category = $post->category->title;
        return response()->json($post);
    }

    public function category(Category $category){
       
        $posts = Category::
        join('posts','category_id','=','categories.id')->
        where('categories.id','=',$category->id)->
        select('posts.id','posts.title')->paginate(10);

        return response()->json(["posts" => $posts, "category" => $category],200);
    }

    public function url_clean(String $url_clean){
      
        $post = Post::
        where('url_clean','=',$url_clean)->
        select('posts.id','posts.title','posts.url_clean')->first();

        if(is_null($post)){
            return response()->json(["post" => null, "msg"=> "No encontrado"],400);
        }
        return response()->json(["post" => $posts],200);

    }
}
