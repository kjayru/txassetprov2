<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Models\QuizQuestionOption;
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
        $quizes = Quiz::orderBy('id','desc')->get();
      
       return view('backend.exam.index',['quizes'=>$quizes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cursos = Course::orderBy('id','desc')->get();
       
        return view('backend.exam.create',['cursos'=>$cursos]);
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $quiz = new Quiz();
       $quiz->title=$request->name;
       $quiz->duration = $request->duration;
       $quiz->course_id = $request->course_id;
       $quiz->save();

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
        $quiz = Quiz::where('id',$id)->first();
        $cursos = Course::orderBy('id','desc')->get();
        return view('backend.exam.edit',['quiz'=>$quiz,'cursos'=>$cursos]);
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
        $quiz = Quiz::find($id);
        $quiz->title=$request->name;
        $quiz->duration = $request->duration;
        $quiz->course_id = $request->course_id;
        $quiz->save();

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
        //
    }



    public function options($opt){
      
        $questions = QuizQuestion::where('quiz_id',$opt)->get();

        return view('backend.exam.options.index',['quiz_id'=>$opt,'questions'=>$questions]);
    }

    public function optionCreate($opt){
      

        return view('backend.exam.options.create',['quiz_id'=>$opt]);
    }

    public function optionStore(Request $request){
      
        
       $pregunta = new QuizQuestion();
       $pregunta->question=$request->question;
       $pregunta->answer = $request->answer;
       $pregunta->quiz_id = $request->quiz_id;
       $pregunta->save();

       $opciona = new QuizQuestionOption();
       $opciona->option = $request->option_a;
       $opciona->identificador="a";
       $opciona->quiz_question_id = $pregunta->id;
       $opciona->save();

       $opcionb = new QuizQuestionOption();
       $opcionb->option = $request->option_b;
       $opcionb->identificador="b";
       $opcionb->quiz_question_id = $pregunta->id;
       $opcionb->save();

       $opcionc = new QuizQuestionOption();
       $opcionc->option = $request->option_c;
       $opcionc->identificador="c";
       $opcionc->quiz_question_id = $pregunta->id;
       $opcionc->save();

       $opciond = new QuizQuestionOption();
       $opciond->option = $request->option_d;
       $opciond->identificador="d";
       $opciond->quiz_question_id = $pregunta->id;
       $opciond->save();

       return redirect()->route('option.index',['opt' => $request->quiz_id ])
        ->with('info','option create');


    }

    public function optionEdit($opt,$id){

        $question = QuizQuestion::where('quiz_id',$opt)->first();
        return view('backend.exam.options.edit',['quiz_id'=>$opt,'question'=>$question]);
    }

    public function optionUpdate(Request $request,$opt,$id){
       

        $pregunta = QuizQuestion::find($id);
        $pregunta->question=$request->question;
        $pregunta->answer = $request->answer;
       
        $pregunta->save();
 
        $opciona =  QuizQuestionOption::find($request->quiz_question_option_a);
        $opciona->option = $request->option_a;
        $opciona->identificador="a";
    
        $opciona->save();
 
        $opcionb =  QuizQuestionOption::find($request->quiz_question_option_b);
        $opcionb->option = $request->option_b;
        $opcionb->identificador="b";
       
        $opcionb->save();
 
        $opcionc =  QuizQuestionOption::find($request->quiz_question_option_c);
        $opcionc->option = $request->option_c;
        $opcionc->identificador="c";
        
        $opcionc->save();
 
        $opciond =  QuizQuestionOption::find($request->quiz_question_option_d);
        $opciond->option = $request->option_d;
        $opciond->identificador="d";
       
        $opciond->save();
 
        return redirect()->route('option.index',['opt' => $request->quiz_id ])
         ->with('info','option update');
    }

}
