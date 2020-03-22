<?php

namespace App\Http\Controllers\dashboard;

use App\Post;
use App\Category;
use App\PostImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostPost;
use Illuminate\Pagination\Paginator;


class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','rol.admin']);

    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $posts = Post::paginate(10);
        return view('dashboard.posts.index', ['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get()->pluck('id','titulo');
        return view('dashboard.posts.create',['post' => new Post(), 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostPost $request)
    {
        /* $request->validate([
            'title' => 'required|min:5|max:50',
            'content' => 'required|min:5'
        ]); */
        //dd($request->validated());
        $data = $request->validated();
        Post::create($data);
        return back()->with('status','Post creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //$post = Post::findOrFail($id);
        return view('dashboard.posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::get()->pluck('id','titulo');
        return view('dashboard.posts.edit', ['post' => $post, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostPost $request,Post $post)
    {
        $data = $request->validated();
        $post->update($data);
        return back()->with('status','Post actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('status','Post eliminado con exito');
    }

    //Subir foto
    public function image(Request $request,Post $post)
    {
        $request->validate([
            'image'=> 'required|mimes:jpeg,bmp,png|max:10240'
        ]);
        $filename = time().".".$request->image->extension();
        $request->image->move(public_path('images'),$filename);
        $data = [
            'image' => $filename,
            'post_id' => $post->id
        ];
        PostImage::create($data);
        return back()->with('status','Imagen cargada con éxito');

    }
}
