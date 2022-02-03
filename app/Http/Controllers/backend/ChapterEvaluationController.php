<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Chapterevaluation;
use App\Models\Evaluationoption;
use App\Models\Chapter;

class ChapterEvaluationController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
   }
    public function index($id)
    {
        $chapter = Chapter::find($id);
        $evaluations = Chapterevaluation::where('chapter_id',$id)->get();

        return view("backend.evaluation.index",['evaluations'=>$evaluations,'id'=>$id,'chapter'=>$chapter]);
    }


    public function show($id)
    {

        $chapter = Chapter::find($id);
        $evaluations = Chapterevaluation::where('chapter_id',$id)->get();

        return view("backend.evaluation.index",['evaluations'=>$evaluations,'id'=>$id,'chapter'=>$chapter]);
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


        $quest = new Chapterevaluation();
        $quest->question = $request->question;
        $quest->chapter_id = $request->parent_id;
        $quest->save();


        foreach($request->option as $k => $op){

            $opcion = New Evaluationoption();
            $opcion->option=$op;

            $opcion->answer= $request->result[$k];
            $opcion->chapterevaluation_id = $quest->id;
            $opcion->save();
        }



        return redirect()->route('chapterequiz.show',['id'=>$request->parent_id])
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

        $question = Chapterevaluation::find($id);

       // dd($question->chapter);
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

        $quest = Chapterevaluation::find($id);

        $quest->question = $request->question;
        $quest->chapter_id = $request->parent_id;
        $quest->save();


        Evaluationoption::where('chapterevaluation_id',$id)->delete();

        foreach($request->option as $k => $op){

            $opcion = New Evaluationoption();
            $opcion->option=$op;

            $opcion->answer= $request->result[$k];
            $opcion->chapterevaluation_id = $quest->id;
            $opcion->save();
        }

        return redirect()->route('chapterequiz.show',['id'=>$request->parent_id])
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
        $data = Chapterevaluation::find($request->id);

        Chapterevaluation::find($request->id)->delete();
        return redirect('/admin/chapterequiz/'.$data->chapter->id)
        ->with('info','Question deleted');
    }
}
