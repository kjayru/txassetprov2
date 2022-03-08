<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Post;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view("backend.posts.index",['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $post = new Post();
        $post->titulo = $request->titulo;
        $post->slug = Str::slug($request->titulo, '-');


        if($request->hasFile('card')) {
            $card = $request->file('card')->store('card');
            $post->card = $card;
        }

        if($request->hasFile('banner')) {
            $banner = $request->file('banner')->store('banner');
            $post->banner = $banner;
        }

        $post->contenido = $request->description;
        $post->save();

        return redirect()->route('posts.index',['id' => $post->id ])
        ->with('info','Industry satisfactoriamente');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $post = Post::find($id);

        return view('backend.posts.edit',['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        $post->titulo = $request->titulo;
        $post->slug = Str::slug($request->titulo, '-');
        if($request->hasFile('card')) {
            $card = $request->file('card')->store('card');
            $post->card = $card;
        }
        if($request->hasFile('banner')) {
            $banner = $request->file('banner')->store('banner');
            $post->banner = $banner;
        }
        $post->contenido = $request->description;
        $post->save();

        return redirect()->route('posts.index',['id' => $post->id ])
        ->with('info','Post updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Post::find($request->id)->delete();
        return redirect()->route('posts.index')
        ->with('info','Event deleted');
    }
}
