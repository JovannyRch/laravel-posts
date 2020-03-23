<?php

namespace App\Http\Controllers\api;

use App\Post;
use App\Category;
use App\PostImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index(){
        $posts = Post::
        select("posts.id","posts.title","posts.category_id")->
        paginate(10);

        foreach ($posts as &$p ) {
            $p['category'] = Category::where('id','=',$p->category_id)->select('titulo as category')->first()['category'];
            $p['image'] = PostImage::where("post_id","=",$p->id)->select('image')->first()['image'];
            unset($p['category_id']);
        }
        
        return response()->json($posts);
    }

    public function show(Post $post){
        
        $post['image'] = $post->image->image;
        $post['category'] = $post->category->title;
        return response()->json($post);
    }

    public function category(Category $category){
       
        $posts = Category::
        join('posts','category_id','=','categories.id')->
        join('post_images','posts.id','=','post_images.id')->
        where('categories.id','=',$category->id)->
        select('posts.id','posts.title','posts.content','post_images.image')->paginate(10);

        

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
