<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Chapterevaluation;
use App\Models\Evaluationoption;
use App\Models\Chapter;
use App\Models\ChapterQuiz;
use App\Models\ChapterQuizOption;

class ChapterEvaluationController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
   }
    public function index($id)
    {
       $chapter = Chapter::find($id);
        $chapters = ChapterQuiz::where('chapter_id',$id)->get();
        
       
        return view("backend.evaluation.index",['id'=>$id,'chapters'=>$chapters,'chapter'=>$chapter]);
    }


    public function show($id)
    {
        $chapter = Chapter::find($id);
        $chapters = ChapterQuiz::where('chapter_id',$id)->get();
        
        return view("backend.evaluation.index",['id'=>$id,'chapters'=>$chapters,'chapter'=>$chapter]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
       
        return view('backend.evaluation.create',['id'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
       
        $quest = new ChapterQuiz();
        $quest->chapter_id = $request->parent_id;
        $quest->question = $request->question;
       
        $quest->save();

        foreach($request->option as $k => $op){
           
            $opcion = New ChapterQuizOption();
            $opcion->option = $op;
            if($request->result==$k+1){
                $opcion->estado = 1;
                }
            $opcion->chapter_quiz_id = $quest->id;
            $opcion->save();
        }


       
        return redirect()->route('chapterequiz.index',['chapter'=>$request->parent_id])
        ->with('info','Question create');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $question = ChapterQuiz::find($id);
        
       
        return view('backend.evaluation.edit',['question'=>$question,'id'=>$id]);
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
        $quest = ChapterQuiz::find($id);

        $quest->question = $request->question;
        $quest->chapter_id = $request->parent_id;
        $quest->save();


        ChapterQuizOption::where('chapter_quiz_id',$id)->delete();

        foreach($request->option as $k => $op){

            $opcion = New ChapterQuizOption();
            $opcion->option = $op;
            if($request->result==$k+1){
            $opcion->estado = 1;
            }
            $opcion->chapter_quiz_id = $id;
            $opcion->save();
        }

        return redirect()->route('chapterequiz.index',['chapter'=>$request->parent_id])
        ->with('info','Question updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = ChapterQuiz::find($request->id);
        
        ChapterQuiz::where('id',$request->id)->delete();

        ChapterQuizOption::where('chapter_quiz_id',$request->id)->delete();

        return redirect('/admin/chapterequiz/'.$data->chapter->id)
        ->with('info','Question deleted');
    }
}
