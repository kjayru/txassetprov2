<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Chaptercontent;

class ChapterContentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
   }
    public function index($id)
    {
        $contents = Chaptercontent::where('chapter_id',$id)->get();

        return view("backend.content.index",['contents'=>$contents,'chapter_id'=>$id]);
    }


    public function show($id)
    {
        $contents = Chaptercontent::where('chapter_id',$id)->get();

        return view("backend.content.index",['contents'=>$contents,'chapter_id'=>$id]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('backend.content.create',['id'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request);
        $content = new Chaptercontent();
        $content->titulo = $request->title;
        $content->slug = Str::slug($request->title, '-');

        if($request->hasFile('video')) {
            $video = $request->file('video')->store('video');
            $content->video = $video;
        }

        if($request->hasFile('audio')) {
            $audio = $request->file('audio')->store('audio');
            $content->audio = $audio;
        }

        $content->contenido = $request->description;
        $content->chapter_id = $request->parent_id;
        $content->save();

        return redirect('/admin/chaptercontent/'.$request->parent_id)
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

        $content = Chaptercontent::find($id);

        return view('backend.content.edit',['content'=>$content]);
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

        $content = Chaptercontent::find($id);

        $content->titulo = $request->title;
        $content->slug = Str::slug($request->title, '-');

        if($request->hasFile('video')) {
            $video = $request->file('video')->store('video');
            $content->video = $video;
        }

        if($request->hasFile('audio')) {
            $audio = $request->file('audio')->store('audio');
            $content->audio = $audio;
        }

        $content->contenido = $request->description;
        $content->chapter_id = $request->parent_id;
        $content->save();

        return redirect('/admin/chaptercontent/'.$request->parent_id)
        ->with('info','Chapter updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = Chaptercontent::find($request->id);

        Chaptercontent::find($request->id)->delete();
        return redirect('/admin/chaptercontent/'.$data->chapter->id)
        ->with('info','Event deleted');
    }
}
