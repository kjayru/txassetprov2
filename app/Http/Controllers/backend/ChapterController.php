<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Chapter;
use App\Models\ChapterQuiz;
use App\Models\Quiz;

class ChapterController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
   }
    public function index($course)
    {
       
        $chapters = Chapter::where('course_id',$course)->get();
       
        return view("backend.chapters.index",['chapters'=>$chapters,'course_id'=>$course]);
    }


    public function show($id)
    {
        $chapters = Chapter::where('course_id',$id)->get();

        return view("backend.chapters.index",['chapters'=>$chapters,'id'=>$id]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($course)
    {

        $quizes = Quiz::orderBy('id','desc')->get();
        return view('backend.chapters.create',['course_id'=>$course,'quizes'=>$quizes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $chapter = new Chapter();
        $chapter->title = $request->title;
        $chapter->slug = Str::slug($request->title, '-');
       // $chapter->contenido = $request->description;
        $chapter->course_id = $request->parent_id;
       // $chapter->quiz_id = $request->quiz_id;

        $chapter->video = $request->video;
        $chapter->audio = $request->audio;
        $chapter->reading = $request->reading;
        $chapter->save();

        if(isset($request->quiz_id)){
        $chapquiz = new ChapterQuiz();
        $chapquiz->chapter_id = $chapter->id;
        $chapquiz->quiz_id = $request->quiz_id;

        $chapquiz->save();
        }


        return redirect('/admin/chapters/'.$request->parent_id)
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

        $chapter = Chapter::find($id);
        $quizes = Quiz::orderBy('id','desc')->get();

        return view('backend.chapters.edit',['chapter'=>$chapter,'quizes'=>$quizes]);
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
        $chapter = Chapter::find($id);
        $chapter->title = $request->title;
        $chapter->slug = Str::slug($request->title, '-');
        //$chapter->contenido = $request->description;
        $chapter->course_id = $request->parent_id;
        $chapter->quiz_id = $request->quiz_id;
        $chapter->video = $request->video;
        $chapter->audio = $request->audio;
        $chapter->reading = $request->reading;
        $chapter->save();

        return redirect('/admin/chapters/'.$request->parent_id)
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
        $data = Chapter::find($request->id);

        Chapter::find($request->id)->delete();
        return redirect('/admin/chapters/'.$data->course->id)
        ->with('info','Event deleted');
    }
}
