<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use App\Models\Chapter;
use App\Models\Chaptercontent;
use App\Models\UserCourse;
use App\Models\UserCourseChapter;
use App\Models\UserCourseChapterContent;
use App\Models\ChapterQuiz;
use App\Models\ChapterQuizOption;
use App\Models\UserChapterQuizOption;
use App\Models\UserChapterQuiz;
use Illuminate\Support\Facades\Auth;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Models\QuizQuestionOption;
use App\Models\Profile;
use App\Models\Exam;

class LearnController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
   }
   
    public function index($slug){
        
      

        $capVisitados=null;
        $contVisitados=null;
        $contenido=null;
        $capitulo=null;
        $examen=null;

        $user_id = Auth::id();
        $user = User::find($user_id);

        $profile = Profile::where('user_id',$user_id)->count();

        if($profile==0){
            return redirect()->route('profile.index');
        }


        $curso = Course::where('slug',$slug)->first();
       
        $userCourse = UserCourse::where('user_id',$user_id)->where('course_id',$curso->id)->first();
        $user_course_chapter_id = null;
        $user_course_chapter_content_id = null;
        $userCourseChapter = UserCourseChapter::where('user_course_id',$userCourse->id)->first();
        
        if(isset($userCourseChapter)){
            $user_course_chapter_id = $userCourseChapter->id;
            $userCourseChapterContent = UserCourseChapterContent::where('user_course_chapter_id',$userCourseChapter->id)->first();
        }
       
        if(isset($userCourseChapterContent)){
            $user_course_chapter_content_id = $userCourseChapterContent->id;
        }

        /*$chapters = $curso->chapters;
        if(isset($chapters)){
            $contenido = Chaptercontent::where('chapter_id',$chapters[0]->id)->where('slug',$chapters[0]->chaptercontents[0]->slug)->first();
        }*/
        //$chapter = Chapter::where('slug',$chapter)->where('course_id',$curso->id)->first();
        //chapter crear order en tabla

        $capitulos = Chapter::where('course_id',$curso->id)->get();
        $content = Chaptercontent::where('chapter_id',$capitulos[0]->id)->first();
        $menulat=null;

        foreach($capitulos as $cap){
            $menucont=null;
            $quiz=false;
            if(isset($cap->chapterquiz)){
                $quiz = true;
            }
            foreach($cap->chaptercontents as $cont){

                $menucont[] = [
                    'id'=>$cont->id,
                    'titulo'=>$cont->titulo,
                    'slug'=>$cont->slug,
                ];
            }
            $menulat[] = [
                    'capitulo_id'=>$cap->id,
                    'capitulo_titulo'=>$cap->title,
                    'curso_titulo'=>$curso->titulo,
                    'curso_slug'=>$curso->slug,
                    'capitulo_slug'=>$cap->slug,
                    'contenidos'=>$menucont,
                    'quiz'=>$quiz,
                    'quiz_content'=>$cap->chapterquiz,
            ];
        }

        $quiz=null;

        // if(isset($curso->quiz)){
        // $examen = $curso->quiz;
        // }

        $examen=null;

     // dd(UserCourse::dayleft($userCourse->id));
          //verificamos el estado del curso
        //-- caducidad
       if(UserCourse::dayleft($userCourse->id)<0){
        
        return redirect()->route('usuario.outcome',['resultado'=>2,'course'=>$userCourse->id]);
       }
       //-- failed
       if($userCourse->aprobado==2){
        
        return redirect()->route('usuario.outcome',['resultado'=>2,'course'=>$userCourse->id]);
       }
       //--aproved
       if($userCourse->aprobado==1){
        
        return redirect()->route('usuario.outcome',['resultado'=>1,'course'=>$userCourse->id]);
       }

        return view('frontpage.learn.index',['examen'=>$examen,'quiz'=>$quiz,'content'=>$content,'contenidos'=>$menulat,'curso'=>$curso,'user_course_id'=>$userCourse->id,'user_course_chapter_id'=>$user_course_chapter_id,'user_course_chapter_content_id'=>$user_course_chapter_content_id]);
    }


    public function chapter($id,$chapter){
      
        $capVisitados=null;
        $contVisitados=null;
        $contenido=null;
        $capitulo=null;
        $user_id = Auth::id();
        $user = User::find($user_id);

        $userCourse = UserCourse::where('user_id',$user_id)->where('course_id',$id)->first();
        $curso = Course::find($userCourse->course_id)->first();
        $chapters = $curso->chapters;

        if(isset($chapters)){
            $capitulo = Chapter::where('slug',$chapter)->first();
            $contenido = Chaptercontent::where('chapter_id',$capitulo->id)->where('slug',$capitulo->chaptercontents[0]->slug)->first();
        }

        return view('frontpage.learn.index',['capitulo'=>$capitulo,'contenido'=>$contenido,'curso'=>$curso,'chapters'=>$chapters,'curso_id'=>$id,'chapter'=>$chapter,'user_course_id'=>$userCourse->id]);
    }

    public function content($id,$chapter,$content){
       
        $capVisitados=null;
        $contVisitados=null;
        $contenido=null;
        $capitulo=null;
        $user_id = Auth::id();
        $user = User::find($user_id);

        $userCourse = UserCourse::where('user_id',$user_id)->where('course_id',$id)->first();
        
        $curso = Course::find($userCourse->course_id)->first();
        $chapters = $curso->chapters;
        if(isset($chapters)){
        $capitulo = Chapter::where('slug',$chapter)->first();

        $contenido = Chaptercontent::where('chapter_id',$capitulo->id)->where('slug',$content)->first();
       
        }
        
        return view('frontpage.learn.index',['capitulo'=>$capitulo,'contenido'=>$contenido,'curso'=>$curso,'chapters'=>$chapters,'curso_id'=>$id,'chapter'=>$chapter,'slug'=>$content,'user_course_id'=>$userCourse->id]);
    }

    public function cursoChapterContent($slug,$chapter,$content){
      
        $user_id = Auth::id();
        $curso = Course::where('slug',$slug)->first();
        $userCourse = UserCourse::where('user_id',$user_id)->where('course_id',$curso->id)->first();

        $chapter = Chapter::where('slug',$chapter)->where('course_id',$curso->id)->first();
       
        $content = Chaptercontent::where('slug',$content)->where('chapter_id',$chapter->id)->first();
        $menulat=null;
      
        //chapter crear order en tabla
        $capitulos = Chapter::where('course_id',$curso->id)->get();

      
        
        $examen = null;
       foreach($capitulos as $cap){
        $menucont=null;
        $quiz=false;
            if(isset($cap->chapterquiz)){
                $quiz = true;
            }
       
            foreach($cap->chaptercontents as $cont){
                $menucont[] = [
                    'id'=>$cont->id,
                    'titulo'=>$cont->titulo,
                    'slug'=>$cont->slug,
                ];
            }

            $menulat[] = [
                    'capitulo_id'=>$cap->id,
                    'capitulo_titulo'=>$cap->title,
                    'curso_titulo'=>$curso->titulo,
                    'curso_slug'=>$curso->slug,
                    'capitulo_slug'=>$cap->slug,
                    'contenidos'=>$menucont,
                    'quiz'=>$quiz,
                    'quiz_content'=>$cap->chapterquiz,
            ];

       }
    $quiz=null;
      
   
    if(isset($curso->examcourse)){
        $examen = $curso->examcourse->exam;
        }
        return view('frontpage.learn.index',['examen'=>$examen,'quiz'=>$quiz,'content'=>$content,'contenidos'=>$menulat,'curso'=>$curso,'user_course_id'=>$userCourse->id]);
    
    }

    public function cursoChapterContentQuiz($slug,$chapter,$id){
     
        $user_id = Auth::id();
        $curso = Course::where('slug',$slug)->first();
        $userCourse = UserCourse::where('user_id',$user_id)->where('course_id',$curso->id)->first();

        $chapter = Chapter::where('slug',$chapter)->where('course_id',$curso->id)->first();
       
      //  $content = Chaptercontent::where('slug',$content)->where('chapter_id',$chapter->id)->first();
        $menulat=null;
      
        //chapter crear order en tabla
        $capitulos = Chapter::where('course_id',$curso->id)->get();

      

       foreach($capitulos as $cap){
        $menucont=null;
        $quiz=false;
        if(isset($cap->chapterquiz)){
            $quiz = true;
        }
       
            foreach($cap->chaptercontents as $cont){
                $menucont[] = [
                    'id'=>$cont->id,
                    'titulo'=>$cont->titulo,
                    'slug'=>$cont->slug,
                ];
            }

            $menulat[] = [
                    'capitulo_id'=>$cap->id,
                    'capitulo_titulo'=>$cap->title,
                    'curso_titulo'=>$curso->titulo,
                    'curso_slug'=>$curso->slug,
                    'capitulo_slug'=>$cap->slug,
                    'contenidos'=>$menucont,
                    'quiz'=>$quiz,
                    'quiz_content'=>$cap->chapterquiz,
            ];

       }
        
       //quiz data
       $quizes = ChapterQuiz::where('chapter_id',$id)->get();
      $content=null;
       
      //verificamos si el usuario tomo el quiz

        $total=0;
        $completado = false;
        //obtenemos el numero de preguntas
        $numeroPreguntas = ChapterQuiz::where('chapter_id',$chapter->id)->count();
        
        
        $preguntas = ChapterQuiz::where('chapter_id',$chapter->id)->get();
        foreach($preguntas as $preg){
            $numerContestadas = UserChapterQuizOption::where('user_id',$user_id)->where('chapter_question_id',$preg->id)->count();
            $total +=$numerContestadas;
        }
       
        if($numeroPreguntas  == $total){
            $completado = true;
        }


        // $preguntas = ChapterQuiz::where('chapter_id',$chapter->id)->get();
        // $totales=0;
        // foreach($preguntas as $preg){
        //     $resultado = ChapterQuizOption::where('chapter_quiz_id',$preg->id)->where('estado',1)->first();
        //     $respuesta[] = $resultado->id;

        //     $resultadoUsuario = UserChapterQuizOption::where('user_id',$user_id)->where('chapter_question_option_id',$resultado->id)->first();
        //     if(isset($resultadoUsuario->id)){
        //         $totales+=1;
        //     }
        // }

        // $preguntas = count($respuesta);

        // $porcentaje = round($totales*100/$preguntas ,2);
       
        // dd($porcentaje);

      
        return view('frontpage.learn.index',['completado'=>$completado,'user_id'=>$user_id,'chapter_id'=> $chapter->id,'quizes'=>$quizes,'content'=>$content,'contenidos'=>$menulat,'curso'=>$curso,'user_course_id'=>$userCourse->id]);
    }

    public function setQuestion(Request $request){
        $user_id = Auth::id();
        //registro eventos quiz

        $participo = UserChapterQuiz::where('user_id',$user_id)->where('chapter_id',$request->chapter_id)->count();

        if($participo>0){
            $actualiza = UserChapterQuiz::where('user_id',$user_id)->where('chapter_id',$request->chapter_id)->first();
            $intentos = $actualiza->intentos+=1;

            $actualiza->puntos = "0";
            $actualiza->intentos = $intentos;
            $actualiza->save();

        }else{

           $registro = new UserChapterQuiz();
           $registro->user_id = $user_id;
           $registro->chapter_id = $request->chapter_id;
           $registro->puntos = "0";
           $registro->intentos = 1;
           $registro->save();
        }
        //registro respuesta quiz
       

        $ucqo = new UserChapterQuizOption();
        $ucqo->user_id = $user_id;
        $ucqo->chapter_question_id = $request->quizid;
        $ucqo->chapter_question_option_id = $request->optionid;

        $ucqo->save();

        //calculo de puntos
        $total=0;
        $completado = false;
        //obtenemos el numero de preguntas
        $numeroPreguntas = ChapterQuiz::where('chapter_id',$request->chapter_id)->count();
        
        
        $preguntas = ChapterQuiz::where('chapter_id',$request->chapter_id)->get();
        foreach($preguntas as $preg){
            $numerContestadas = UserChapterQuizOption::where('user_id',$user_id)->where('chapter_question_id',$preg->id)->count();
            $total +=$numerContestadas;
        }
       
        if($numeroPreguntas  == $total){
            $completado = true;
        }

      

        return response()->json(['rpta'=>'ok','completado'=>$completado]);

    }


    public function resetChapter(Request $request){
        $user_id = Auth::id();
        $ucq = UserChapterQuiz::where('user_id',$user_id)->where('chapter_id',$request->chapter_id)->delete();

        $chapterquestions = ChapterQuiz::where('chapter_id',$request->chapter_id)->get();

        foreach($chapterquestions as $chapter){
            UserChapterQuizOption::where('user_id',$user_id)->where('chapter_question_id',$chapter->id)->delete();
        }
        return response()->json(['rtpa'=>'ok']);
     }


     public function cursoQuiz($slug,$id){
       
       

        $user_id = Auth::id();
        $curso = Course::where('slug',$slug)->first();
        $userCourse = UserCourse::where('user_id',$user_id)->where('course_id',$curso->id)->first();

       
      
        //chapter crear order en tabla
        $capitulos = Chapter::where('course_id',$curso->id)->get();

      
        

       foreach($capitulos as $cap){
        $menucont=null;
        $quiz=false;
            if(isset($cap->chapterquiz)){
                $quiz = true;
            }
       
            foreach($cap->chaptercontents as $cont){
                $menucont[] = [
                    'id'=>$cont->id,
                    'titulo'=>$cont->titulo,
                    'slug'=>$cont->slug,
                ];
            }

            $menulat[] = [
                    'capitulo_id'=>$cap->id,
                    'capitulo_titulo'=>$cap->title,
                    'curso_titulo'=>$curso->titulo,
                    'curso_slug'=>$curso->slug,
                    'capitulo_slug'=>$cap->slug,
                    'contenidos'=>$menucont,
                    'quiz'=>$quiz,
                    'quiz_content'=>$cap->chapterquiz,
            ];

       }
    $quiz=null;
       
    $exam = Exam::find($id);


      
        return view('frontpage.exam.index',['examen'=>$exam,'quiz'=>$quiz,'contenidos'=>$menulat,'curso'=>$curso,'user_course_id'=>$userCourse->id]);
    
     }

     public function congratulation($slug){



        $user_id = Auth::id();
        $curso = Course::where('slug',$slug)->first();
        $userCourse = UserCourse::where('user_id',$user_id)->where('course_id',$curso->id)->first();

       
      
        //chapter crear order en tabla
        $capitulos = Chapter::where('course_id',$curso->id)->get();

      
        

       foreach($capitulos as $cap){
        $menucont=null;
        $quiz=false;
            if(isset($cap->chapterquiz)){
                $quiz = true;
            }
       
            foreach($cap->chaptercontents as $cont){
                $menucont[] = [
                    'id'=>$cont->id,
                    'titulo'=>$cont->titulo,
                    'slug'=>$cont->slug,
                ];
            }

            $menulat[] = [
                    'capitulo_id'=>$cap->id,
                    'capitulo_titulo'=>$cap->title,
                    'curso_titulo'=>$curso->titulo,
                    'curso_slug'=>$curso->slug,
                    'capitulo_slug'=>$cap->slug,
                    'contenidos'=>$menucont,
                    'quiz'=>$quiz,
                    'quiz_content'=>$cap->chapterquiz,
            ];

       }
    $quiz=null;
    $exam=null;
       
    


        return view('frontpage.exam.exitos',['examen'=>$exam,'quiz'=>$quiz,'contenidos'=>$menulat,'curso'=>$curso,'user_course_id'=>$userCourse->id]);
     }

     public function fail($slug){



        $user_id = Auth::id();
        $curso = Course::where('slug',$slug)->first();
        $userCourse = UserCourse::where('user_id',$user_id)->where('course_id',$curso->id)->first();

       
      
        //chapter crear order en tabla
        $capitulos = Chapter::where('course_id',$curso->id)->get();

      
        

       foreach($capitulos as $cap){
        $menucont=null;
        $quiz=false;
            if(isset($cap->chapterquiz)){
                $quiz = true;
            }
       
            foreach($cap->chaptercontents as $cont){
                $menucont[] = [
                    'id'=>$cont->id,
                    'titulo'=>$cont->titulo,
                    'slug'=>$cont->slug,
                ];
            }

            $menulat[] = [
                    'capitulo_id'=>$cap->id,
                    'capitulo_titulo'=>$cap->title,
                    'curso_titulo'=>$curso->titulo,
                    'curso_slug'=>$curso->slug,
                    'capitulo_slug'=>$cap->slug,
                    'contenidos'=>$menucont,
                    'quiz'=>$quiz,
                    'quiz_content'=>$cap->chapterquiz,
            ];

       }
    $quiz=null;
    $exam=null;
       


        return view('frontpage.exam.fallido',['examen'=>$exam,'quiz'=>$quiz,'contenidos'=>$menulat,'curso'=>$curso,'user_course_id'=>$userCourse->id]);
     }
}
