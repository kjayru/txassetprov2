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
use App\Models\UserCourseChapterQuiz;
use App\Models\UserChapterQuiz;
use App\Models\ExamQuestion;
use App\Models\ExamQuestionOption;
use App\Models\UserCourseExamResult;
use App\Models\UserCourseExam;
use Illuminate\Support\Facades\Auth;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Models\QuizQuestionOption;
use App\Models\Profile;
use App\Models\Exam;
use App\Http\Controllers\Traits\CourseMenuTrait;
use Carbon\Carbon;

class LearnController extends Controller
{
    use CourseMenuTrait;

    public function __construct(){
        $this->middleware('auth');
   }

    public function index($slug){

        $capVisitados=null;
        $contVisitados=null;
        $contenido=null;
        $capitulo=null;
        $examen=null;
        $user_course_chapter_id = null;
        $user_course_chapter_content_id = null;
        $quiz=null;
        $url_next=null;
        $url_next_quiz=null;
        $chapter = null;

        $user_id = Auth::id();
        $user = User::find($user_id);



        //verificamos si usuario lleno profile
        $profile = Profile::where('user_id',$user_id)->count();
        if($profile==0){
            return redirect()->route('profile.index');
        }

        $curso = Course::where('slug',$slug)->first();
        $userCourse = UserCourse::where('user_id',$user_id)->where('course_id',$curso->id)->where('intentos',null)->first();
        $userCourseChapter = UserCourseChapter::where('user_course_id',$userCourse->id)->first();

        if(isset($userCourseChapter)){
            $user_course_chapter_id = $userCourseChapter->id;
            $userCourseChapterContent = UserCourseChapterContent::where('user_course_chapter_id',$userCourseChapter->id)->first();
        }

        if(isset($userCourseChapterContent)){
            $user_course_chapter_content_id = $userCourseChapterContent->id;
        }


        $capitulos = Chapter::where('course_id',$curso->id)->get();
        $chapter = Chapter::where('course_id',$curso->id)->first();
        //obtenemos el contenido del primer  capitulo
        $content = Chaptercontent::where('chapter_id',$capitulos[0]->id)->first();

        $sig = Chaptercontent::where('id','>',$content->id)->where('chapter_id',$content->chapter->id)->orderBy('id')->first();
        if(isset($sig)){

            $url_next = $sig->chapter->course->slug."/".$sig->chapter->slug."/".$sig->slug;
        }else{

            $url_next_quiz = $content->chapter->course->slug."/".$content->chapter->slug."/quiz";
        }

        //funcion menu


        $sidelad = $this->getContent($capitulos,$curso);


        if(isset($curso->examcourse)){
            $examen = $curso->examcourse->exam;
        }

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

       $content_slug=null;
     // dd($url_next_quiz);
      // dd($chapter);
        return view('frontpage.learn.index',[
            'examen'=>$examen,
            'quiz'=>$quiz,
            'curso_id'=>$curso->id,
            'user_id'=>$user_id,
            'content'=>$content,
            'contents'=>$sidelad,
            'curso'=>$curso,
            'user_course_id'=>$userCourse->id,
            'user_course_chapter_id'=>$user_course_chapter_id,
            'user_course_chapter_content_id'=>$user_course_chapter_content_id,
            'url_next'=>$url_next,
            'url_next_quiz'=>$url_next_quiz,
            'chapter'=>$chapter,
            'content_slug'=>$content_slug,
            'chapter_quiz_id'=>$chapter->chapterquiz->id,
            'quiz'=>false,
        ]);
    }

    public function chapter($id,$chapter){

        $capVisitados=null;
        $contVisitados=null;
        $contenido=null;
        $capitulo=null;
        $user_id = Auth::id();
        $user = User::find($user_id);

        $userCourse = UserCourse::where('user_id',$user_id)->where('course_id',$id)->where('intentos',null)->first();
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

        $userCourse = UserCourse::where('user_id',$user_id)->where('course_id',$id)->where('intentos',null)->first();

        $curso = Course::find($userCourse->course_id)->first();
        $chapters = $curso->chapters;
        if(isset($chapters)){
        $capitulo = Chapter::where('slug',$chapter)->first();

        $contenido = Chaptercontent::where('chapter_id',$capitulo->id)->where('slug',$content)->first();

        }

        return view('frontpage.learn.index',['capitulo'=>$capitulo,'contenido'=>$contenido,'curso'=>$curso,'chapters'=>$chapters,'curso_id'=>$id,'chapter'=>$chapter,'slug'=>$content,'user_course_id'=>$userCourse->id]);
    }

    public function cursoChapterContent($slug,$chapter,$content){

        $user_course_chapter_id=null;
        $menulat=null;
        $examen = null;
        $quiz=null;
        $url_next=null;
        $url_next_quiz=null;

        $user_id = Auth::id();
        $curso = Course::where('slug',$slug)->first();
        $userCourse = UserCourse::where('user_id',$user_id)->where('course_id',$curso->id)->where('intentos',null)->first();
        $chapter = Chapter::where('slug',$chapter)->where('course_id',$curso->id)->first();
        $content = Chaptercontent::where('slug',$content)->where('chapter_id',$chapter->id)->first();


        //chapter crear order en tabla
        $capitulos = Chapter::where('course_id',$curso->id)->get();


        $ucc = UserCourseChapter::where('user_course_id',$userCourse->id)->where('chapter_id',$chapter->id)->count();

        if($ucc>0){
            $user_course_chapter = UserCourseChapter::where('user_course_id',$userCourse->id)->where('chapter_id',$chapter->id)->first();
            $user_course_chapter_id = $user_course_chapter->id;
        }



        //funcion menu
        $sidelad = $this->getContent($capitulos,$curso);


        if(isset($curso->examcourse)){
            $examen = $curso->examcourse->exam;
        }


        //armado de contenido siguiente

        $sig = Chaptercontent::where('id','>',$content->id)->where('chapter_id',$chapter->id)->orderBy('id')->first();
        if(isset($sig)){

            $url_next = $sig->chapter->course->slug."/".$sig->chapter->slug."/".$sig->slug;
        }else{

            $url_next_quiz = $content->chapter->course->slug."/".$content->chapter->slug."/quiz";
        }

            //dd($url_next_quiz);
        //$cont['contenidos']['curso_slug']}}/{{$cont['contenidos']['capitulo_slug']


        return view('frontpage.learn.index',[
            'examen'=>$examen,
            'user_id'=>$user_id,
            'chapter_id'=> $chapter->id,
            'curso_id'=>$curso->id,
            'quiz'=>$quiz,
            'content'=>$content,
            'contents'=>$sidelad,
            'curso'=>$curso,
            'user_course_id'=>$userCourse->id,
            'user_course_chapter_id' =>$user_course_chapter_id,
            'url_next'=>$url_next,
            'url_next_quiz'=>$url_next_quiz,
            'chapter'=>$chapter,
            'content_slug'=>$content->slug,
            'chapter_quiz_id'=>$chapter->chapterquiz->id,
            'quiz'=>false,
        ]);
    }

    public function cursoChapterContentQuiz($slug, $chapter, $id){

        $user_id = Auth::id();
        $url_next=null;
        $fin_curso = false;
        $user_course_chapter_id =null;
        $curso = Course::where('slug',$slug)->first();
        $userCourse = UserCourse::where('user_id',$user_id)->where('course_id',$curso->id)->where('intentos',null)->first();

        $chapter = Chapter::where('slug',$chapter)->where('course_id',$curso->id)->first();


      //  $content = Chaptercontent::where('slug',$content)->where('chapter_id',$chapter->id)->first();
        $menulat=null;

        $ucc = UserCourseChapter::where('user_course_id',$userCourse->id)->where('chapter_id',$chapter->id)->count();

        if($ucc>0){
            $user_course_chapter = UserCourseChapter::where('user_course_id',$userCourse->id)->where('chapter_id',$chapter->id)->first();
            $user_course_chapter_id = $user_course_chapter->id;
        }

        //chapter crear order en tabla
        $capitulos = Chapter::where('course_id',$curso->id)->get();



        $sidelad = $this->getContent($capitulos,$curso);



        //quiz data
        $quizes = ChapterQuiz::where('chapter_id',$id)->get();
        $content=null;
        $tiempoquiz=0;
        //verificamos si el usuario tomo el quiz

        $total=0;
        $totalcorrectas = 0;
        $completado = false;
        $aprobado = false;
        //obtenemos el numero de preguntas
        $numeroPreguntas = ChapterQuiz::where('chapter_id',$chapter->id)->count();
        $preguntas = ChapterQuiz::where('chapter_id',$chapter->id)->get();

        //determinar si completo todas las preguntas
        foreach($preguntas as $preg){

            $numerContestadas = UserCourseChapterQuiz::where('user_course_chapter_id',$user_course_chapter_id)->where('chapter_quiz_id',$preg->id)->count();

            $total +=$numerContestadas;
        }

        if($numeroPreguntas  == $total){
            $completado = true;
        }


        //determinar si obtuvo el 75% de aciertos

        // foreach($preguntas as $preg){
        //     $correctas = UserCourseChapterQuiz::where('user_course_chapter_id',$user_course_chapter_id)->where('chapter_quiz_id',$preg->id)->where('result','1')->count();
        //     $totalcorrectas +=$correctas;
        // }



        //obtener respuestas correctas
        $correctas = UserCourseChapterQuiz::where('user_course_chapter_id',$user_course_chapter_id)->where('result',1)->count();


        //obtener tiempo quiz
        $ultimo_registro = UserCourseChapterQuiz::where('user_course_chapter_id',$user_course_chapter_id)->orderBy('id','desc')->first();
       if(isset( $ultimo_registro)){
        $tiempoquiz = $ultimo_registro->timequiz;
       }


        $porcentaje = round($correctas*100/$numeroPreguntas ,2);

        $resultado_quiz=false;
        if($correctas ==$numeroPreguntas){
            $resultado_quiz = true;
            $registro = UserCourseChapter::where('user_course_id',$userCourse->id)->where('chapter_id',$id)->first();
           // $registro->quiz_result= 1;
            $registro->save();
        }





        if( Chaptercontent::where('chapter_id','>',$chapter->id)->orderBy('id')->count()>0){
            $sig = Chaptercontent::where('chapter_id','>',$chapter->id)->orderBy('id')->first();
            if($sig->chapter->course->slug == $slug){
            $url_next = $sig->chapter->course->slug."/".$sig->chapter->slug."/".$sig->slug;
            }else{
                $fin_curso=true;
            }
        }else{
            $fin_curso=true;
        }



        if(isset($curso->examcourse)){
            $examen = $curso->examcourse->exam;
        }


        return view('frontpage.learn.index',[
            'examen'=>$examen,
            'resultado_quiz' =>$resultado_quiz,
            'numero_preguntas'=>$numeroPreguntas,
            'correctas'=>$correctas,
            'completado'=>$completado,
            'user_id'=>$user_id,
            'chapter_id'=> $chapter->id,
            'curso_id'=>$curso->id,
            'quizes'=>$quizes,
            'content'=>$content,
            'contents'=>$sidelad,
            'curso'=>$curso,
            'quiz_chapter_id'=>$id,
            'user_course_id'=>$userCourse->id,
            'user_course_chapter_id' =>$user_course_chapter_id,
            'porcentaje'=>$porcentaje,
            'tiempoquiz'=>$tiempoquiz,
            'url_next'=>$url_next,
            'fin_curso' => $fin_curso,
            'content_slug'=>null,
            'chapter'=>$chapter,
            'chapter_quiz_id'=>$chapter->chapterquiz->id,
            'quiz'=>true,
        ]);
    }

    public function setQuestion(Request $request){
        $user_id = Auth::id();

        $respuesta = 0;
        $resultado = ChapterQuizOption::where('id',$request->optionid)->first();

        if($resultado->estado==1){
            $respuesta = 1;
        }


        $ucqo = new UserCourseChapterQuiz();
        $ucqo->chapter_quiz_id = $request->quizid;
        $ucqo->user_course_chapter_id = $request->user_course_chapter_id;

        $ucqo->quiz_question_option_id = $request->optionid;
        $ucqo->result = $respuesta;
        $ucqo->timequiz = $request->tiempo;
        $ucqo->save();


        //calculo de puntos
        $total=0;
        $completado = false;
        //obtenemos el numero de preguntas

        $numeroPreguntas = ChapterQuiz::where('chapter_id',$request->chapter_id)->count();

        $preguntas = ChapterQuiz::where('chapter_id',$request->chapter_id)->get();

        foreach($preguntas as $preg){

            $numerContestadas = UserCourseChapterQuiz::where('user_course_chapter_id',$request->user_course_chapter_id)->where('chapter_quiz_id',$preg->id)->count();
            $total += $numerContestadas;
        }

        if($numeroPreguntas  == $total){
            $completado = true;
        }

        $correctas = UserCourseChapterQuiz::where('user_course_chapter_id',$request->user_course_chapter_id)->where('result',1)->count();

        $porcentaje = round($correctas*100/$numeroPreguntas ,2);

        if($correctas ==$numeroPreguntas &&  $porcentaje >75){
        $registro = UserCourseChapter::where('user_course_id',$request->user_course_id)->where('chapter_id',$request->chapter_id)->first();
            $registro->quiz_result= 1;
            $registro->save();

        }

        return response()->json(['rpta'=>'ok','completado'=>$completado,'np'=>$numeroPreguntas,'nc'=>$total]);

    }


    public function resetChapter(Request $request){
        $user_id = Auth::id();
        UserCourseChapterQuiz::where('user_course_chapter_id',$request->user_course_chapter_id)->delete();
        return response()->json(['rtpa'=>'ok']);
    }


    public function cursoQuiz($slug,$id){

    $capVisitados=null;
    $contVisitados=null;
    $contenido=null;
    $capitulo=null;
    $examen=null;
    $user_course_chapter_id = null;
    $user_course_chapter_content_id = null;
    $quiz=null;
    $url_next=null;
    $url_next_quiz=null;
    $chapter = null;
    $tomo_examen=null;
    $total_preguntas=null;
    $total_respondidas = null;
    $total_correctas= null;
    $porcentaje=0;
    $completo_examen=0;
    $numeroIntentos=0;

    $user_id = Auth::id();
    $user = User::find($user_id);

    $curso = Course::where('slug',$slug)->first();
    $userCourse = UserCourse::where('user_id',$user_id)->where('course_id',$curso->id)->where('intentos',null)->first();
    $userCourseChapter = UserCourseChapter::where('user_course_id',$userCourse->id)->first();

    if(isset($userCourseChapter)){
        $user_course_chapter_id = $userCourseChapter->id;
        $userCourseChapterContent = UserCourseChapterContent::where('user_course_chapter_id',$userCourseChapter->id)->first();
    }

    if(isset($userCourseChapterContent)){
        $user_course_chapter_content_id = $userCourseChapterContent->id;
    }


    $capitulos = Chapter::where('course_id',$curso->id)->get();
    //obtenemos el contenido del primer  capitulo
    $content = Chaptercontent::where('chapter_id',$capitulos[0]->id)->first();

    $sig = Chaptercontent::where('id','>',$content->id)->where('chapter_id',$content->chapter->id)->orderBy('id')->first();

    if(isset($sig)){
        $url_next = $sig->chapter->course->slug."/".$sig->chapter->slug."/".$sig->slug;
    }else{
        $url_next_quiz = $content->chapter->course->slug."/".$content->chapter->slug."/quiz";
    }

    $sidelad = $this->getContent($capitulos,$curso);
    $exam = Exam::find($id);

    //comprobar si tomo examen
    if(UserCourseExam::where('exam_id',$id)->where('user_course_id',$userCourse->id)->count()>0){

        $tomo_examen = UserCourseExam::where('exam_id',$id)->where('user_course_id',$userCourse->id)->first();
        $total_preguntas = ExamQuestion::where('exam_id',$id)->count();
        $total_respondidas = UserCourseExamResult::where('user_course_exam_id', $tomo_examen->id)->count();
        $total_correctas = UserCourseExamResult::where('user_course_exam_id', $tomo_examen->id)->where('result','1')->count();
        $porcentaje = round($total_correctas*100/$total_preguntas ,2);
        $completo_examen = $tomo_examen->complete;
        $numeroIntentos = $tomo_examen->intentos;
    }

    return view('frontpage.exam.index',[
        'examen'=>$exam,
        'quiz'=>$quiz,
        'curso_id'=>$curso->id,
        'user_id'=>$user_id,
        'content'=>$content,
        'contents'=>$sidelad,
        'curso'=>$curso,
        'user_course_id'=>$userCourse->id,
        'user_course_chapter_id'=>$user_course_chapter_id,
        'user_course_chapter_content_id'=>$user_course_chapter_content_id,
        'url_next'=>$url_next,
        'url_next_quiz'=>$url_next_quiz,
        'chapter'=>$chapter,
        'tomo_examen'=>$tomo_examen,
        'total_preguntas'=>$total_preguntas,
        'total_respondidas'=>$total_respondidas,
        'total_correctas'=>$total_correctas,
        'porcentaje'=>$porcentaje,
        'completo_examen'=>$completo_examen,
        'content_slug'=>$content->slug,
        'chapter_quiz_id'=>null,
        'quiz'=>false,
        'numero_intentos' =>$numeroIntentos,

    ]);

    }

    public function congratulation($slug){
        $user_id = Auth::id();
        $curso = Course::where('slug',$slug)->first();
        $userCourse = UserCourse::where('user_id',$user_id)->where('course_id',$curso->id)->where('intentos',null)->first();
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
        $userCourse = UserCourse::where('user_id',$user_id)->where('course_id',$curso->id)->where('intentos',null)->first();



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



        return view('frontpage.exam.fallido',[
            'examen'=>$exam,
            'quiz'=>$quiz,
            'contenidos'=>$menulat,
            'curso'=>$curso,
            'user_course_id'=>$userCourse->id,

        ]);
    }


    public function setExam(Request $request){

        if(isset($request->evento)){
            if(UserCourseExam::where('user_course_id',$request->user_course_id)->where('exam_id',$request->exam_id)->count()==0){
                $registro = new UserCourseExam();
                $registro->user_course_id = $request->user_course_id;
                $registro->exam_id = $request->exam_id;
                $registro->tiempo = $request->tiempo;
                $registro->resultado = 0;
                $registro->complete = 1;
                $registro->evento= $request->evento;
                $registro->save();

              }else{

                $registro =  UserCourseExam::where('user_course_id',$request->user_course_id)->where('exam_id',$request->exam_id)->first();
                $registro->tiempo = $request->tiempo;
                $registro->resultado = 0;
                $registro->complete = 1;
                $registro->evento= $request->evento;
                $registro->save();

              }


              return response()->json(['rpta'=>'ok','status'=>'200','completo'=>false]);
              //numero de preguntas
             // $preguntas = ExamQuestion::where('exam_id',$request->exam_id)->get();


        }


      //registro general
      if(UserCourseExam::where('user_course_id',$request->user_course_id)->where('exam_id',$request->exam_id)->count()==0){
        $registro = new UserCourseExam();
        $registro->user_course_id = $request->user_course_id;
        $registro->exam_id = $request->exam_id;
        $registro->tiempo = $request->tiempo;
        $registro->resultado = 0;

        $registro->save();

      }else{

        $registro =  UserCourseExam::where('user_course_id',$request->user_course_id)->where('exam_id',$request->exam_id)->first();
        $registro->tiempo = $request->tiempo;
        $registro->save();

      }

      $regoption = new UserCourseExamResult();
      $regoption->user_course_exam_id = $registro->id;
      $regoption->exam_question_id = $request->quizid;
      //buscamos resultado correcto
      $regoption->exam_question_option_id = $request->optionid;

        $findresult = ExamQuestionOption::find($request->optionid);
       $regoption->result = $findresult->resultado;
       $regoption->save();


       $total_preguntas = ExamQuestion::where('exam_id',$request->exam_id)->count();
       $total_respondidas = UserCourseExamResult::where('user_course_exam_id',$registro->id)->count();

       if($total_preguntas == $total_respondidas){
        $actualizar =  UserCourseExam::where('user_course_id',$request->user_course_id)->where('exam_id',$request->exam_id)->first();
        $actualizar->complete =1;
        $actualizar->intentos += 1;
        $actualizar->save();

        $tomo_examen = UserCourseExam::where('exam_id',$request->exam_id)->where('user_course_id',$request->user_course_id)->first();
        $total_correctas = UserCourseExamResult::where('user_course_exam_id', $tomo_examen->id)->where('result','1')->count();
        $porcentaje = round($total_correctas*100/$total_preguntas ,2);

        if($porcentaje>=75){
            $usercourse = UserCourse::where('id',$request->user_course_id)->where('intentos',null)->first();
            $usercourse->aprobado = 1;
            $usercourse->intentos = 1;
            $usercourse->save();
        }else{
            $usercourse = UserCourse::where('id',$request->user_course_id)->where('intentos',null)->first();
            $usercourse->aprobado = 0;
            $usercourse->intentos = 1;
            $usercourse->save();
        }

        return response()->json(['rpta'=>'ok','status'=>'200','completo'=>true]);


       }

        return response()->json(['rpta'=>'ok','status'=>'200','completo'=>false]);
    }

    public function resetExam(Request $request){
        $uce = UserCourseExam::where('user_course_id',$request->user_course_id)->where('exam_id',$request->exam_id)->first();
       // $uce->intentos = $uce->intentos+1;
        $uce->complete = 0;
        $uce->save();

        UserCourseExamResult::where('user_course_exam_id',$request->user_course_exam_id)->delete();

        return response()->json(['status'=>'200','rpta'=>'ok']);
    }

    public function viewExam(Request $request){
        $total_preguntas = ExamQuestion::where('exam_id',$request->exam_id)->get();
        $total_respondidas = UserCourseExamResult::where('user_course_exam_id',$request->user_course_exam_id)->get();



        foreach($total_preguntas as $preg){

            $opciones=null;
            foreach($preg->examquestionoptions as $opcion){
                $user_responde=false;
                $acierto = false;

                if(UserCourseExamResult::where('exam_question_option_id',$opcion->id)->count()>0){
                    $user_responde = true;

                    $urespuesta = UserCourseExamResult::where('exam_question_option_id',$opcion->id)->first();

                    if($urespuesta->exam_question_option_id == $opcion->id && $urespuesta->result ==1){
                        $acierto = true;
                    }
                }


                $opciones[]=[
                    'id'=>$opcion->id,
                    'name'=> $opcion->opcion,
                    'resultado'=>$opcion->resultado,
                    'responde'=>$user_responde,
                    'acierto'=>$acierto,
                    'exam_question_option_id'=>@$urespuesta->exam_question_option_id,
                    'opcion_resultado'=>@$urespuesta->result

                ];

            }

            $preguntas[]=[
                'question_id'=>$preg->id,
                'question_name'=>$preg->question,
                'opciones'=>$opciones

            ];

        }
        return response()->json($preguntas);
    }

    public function restartCourse(Request $request){

        $user_id = Auth::id();

        $curso = new UserCourse();
        $curso->user_id = $user_id;
        $curso->course_id = $request->course_id;
        $curso->fecha_inicio = Carbon::now()->format('Y-m-d');
        $curso->dias_activo = 15;
        $curso->save();

        return response()->json(['rpta'=>'ok']);

    }
}
