<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\ExamQuestion;
use App\Models\ExamQuestionOption;
use App\Models\Course;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $examenes = Exam::orderBy('id','desc')->get();
      
       return view('backend.exam.index',['examenes'=>$examenes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
       
        return view('backend.exam.create',);
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
       $exam = new Exam();
       $exam->title=$request->name;
       $exam->duration = $request->duration;
       $exam->description = $request->description;
       $exam->save();

       return redirect()->route('exam.index')
        ->with('info','Exam create');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exam = Exam::where('id',$id)->first();
       
        return view('backend.exam.edit',['exam'=>$exam]);
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
        $exam = Exam::find($id);
        $exam->title=$request->name;
        $exam->duration = $request->duration;
        $exam->description = $request->description;
        $exam->save();

       return redirect()->route('exam.index')
        ->with('info','Exam update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Exam::find($request->id)->delete();

        return redirect()->route('exam.index')
        ->with('info','Exam deleted');
    }



    public function options($opt){
      
        $questions = ExamQuestion::where('exam_id',$opt)->get();

        return view('backend.exam.options.index',['exam_id'=>$opt,'questions'=>$questions]);
    }

    public function optionCreate($opt){
      

        return view('backend.exam.options.create',['exam_id'=>$opt]);
    }

    public function optionStore(Request $request){
      
        
       $pregunta = new ExamQuestion();
       $pregunta->question=$request->question;
       $pregunta->exam_id = $request->exam_id;
       $pregunta->save();


       foreach($request->option as $k => $op){

            $opcion = New ExamQuestionOption();
            $opcion->opcion = $op;
            $opcion->resultado = $request->result[$k];
            $opcion->exam_question_id = $pregunta->id;
            $opcion->save();
        }

    //    $opciona = new ExamQuestionOption();
    //    $opciona->option = $request->option_a;
    //    $opciona->identificador="a";
    //    $opciona->exam_question_id = $pregunta->id;
    //    $opciona->save();

    //    $opcionb = new ExamQuestionOption();
    //    $opcionb->option = $request->option_b;
    //    $opcionb->identificador="b";
    //    $opcionb->exam_question_id = $pregunta->id;
    //    $opcionb->save();

    //    $opcionc = new ExamQuestionOption();
    //    $opcionc->option = $request->option_c;
    //    $opcionc->identificador="c";
    //    $opcionc->exam_question_id = $pregunta->id;
    //    $opcionc->save();

    //    $opciond = new ExamQuestionOption();
    //    $opciond->option = $request->option_d;
    //    $opciond->identificador="d";
    //    $opciond->exam_question_id = $pregunta->id;
    //    $opciond->save();



       return redirect()->route('option.index',['opt' => $request->exam_id ])
        ->with('info','option create');


    }

    public function optionEdit($opt,$id){

        //dd($opt." ".$id);
        $question = ExamQuestion::where('id',$id)->first();

        return view('backend.exam.options.edit',['exam_id'=>$opt,'question'=>$question]);
    }

    public function optionUpdate(Request $request,$opt,$id){
       

        $pregunta = ExamQuestion::find($id);
        $pregunta->question=$request->question;
        $pregunta->exam_id = $request->exam_id;
        $pregunta->save();


        ExamQuestionOption::where('exam_question_id',$id)->delete();

        foreach($request->option as $k => $op){

            $opcion = New ExamQuestionOption();
            $opcion->opcion = $op;
            $opcion->resultado = $request->result[$k];
            $opcion->exam_question_id = $pregunta->id;
            $opcion->save();
        }
        
        // $opciona =  ExamQuestionOption::find($request->quiz_question_option_a);
        // $opciona->option = $request->option_a;
        // $opciona->identificador="a";
    
        // $opciona->save();
 
        // $opcionb =  ExamQuestionOption::find($request->quiz_question_option_b);
        // $opcionb->option = $request->option_b;
        // $opcionb->identificador="b";
       
        // $opcionb->save();
 
        // $opcionc =  ExamQuestionOption::find($request->quiz_question_option_c);
        // $opcionc->option = $request->option_c;
        // $opcionc->identificador="c";
        
        // $opcionc->save();
 
        // $opciond =  ExamQuestionOption::find($request->quiz_question_option_d);
        // $opciond->option = $request->option_d;
        // $opciond->identificador="d";
       
        // $opciond->save();
 
        return redirect()->route('option.index',['opt' => $request->exam_id])
         ->with('info','option update');
    }


    public function optionDestroy(Request $request,$opt){
       
        ExamQuestion::find($request->id)->delete();

        return redirect()->route('option.index',['opt'=>$opt])
        ->with('info','Option deleted');
    }

    
}
