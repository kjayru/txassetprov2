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
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use App\Mail\Aprobado;
use App\Mail\Rechazado;
use Illuminate\Support\Facades\Log;

class LearnController extends Controller
{
    use CourseMenuTrait;

    public function __construct(){
        $this->middleware('auth');
   }

    public function index($id,$slug){


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



        $userCourse = UserCourse::find($id);
        $userCourseChapter = UserCourseChapter::where('user_course_id',$userCourse->id)->first();

        if(isset($userCourseChapter)){
            $user_course_chapter_id = $userCourseChapter->id;
            $userCourseChapterContent = UserCourseChapterContent::where('user_course_chapter_id',$userCourseChapter->id)->first();
        }

        if(isset($userCourseChapterContent)){
            $user_course_chapter_content_id = $userCourseChapterContent->id;
        }


        $capitulos = Chapter::where('course_id',$curso->id)->orderBy('order','asc')->get();

        $chapter = Chapter::where('course_id',$curso->id)->orderBy('order','asc')->first();


        //obtenemos el contenido del primer  capitulo
        $content = Chaptercontent::where('chapter_id',$capitulos[0]->id)->first();

        $sig = Chaptercontent::where('id','>',$content->id)->where('chapter_id',$content->chapter->id)->orderBy('id')->first();
        if(isset($sig)){

            $url_next = $id."/".$sig->chapter->course->slug."/".$sig->chapter->slug."/".$sig->slug;
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

        $userCourse = UserCourse::where('user_id',$user_id)->where('course_id',$id)->where('intentos',null)->first();

        $curso = Course::find($userCourse->course_id)->first();
        $chapters = $curso->chapters;
        if(isset($chapters)){
        $capitulo = Chapter::where('slug',$chapter)->first();

        $contenido = Chaptercontent::where('chapter_id',$capitulo->id)->where('slug',$content)->first();

        }

        return view('frontpage.learn.index',['capitulo'=>$capitulo,'contenido'=>$contenido,'curso'=>$curso,'chapters'=>$chapters,'curso_id'=>$id,'chapter'=>$chapter,'slug'=>$content,'user_course_id'=>$userCourse->id]);
    }


    public function cursoChapterContent($id, $slug, $chapterSlug, $contentSlug)
    {
        $user_course_chapter_id = null;
        $examen = null;
        $quiz = null;
        $url_next = null;
        $url_next_quiz = null;

        $user_id = Auth::id();
        $curso = Course::where('slug', $slug)->firstOrFail();
        $userCourse = UserCourse::findOrFail($id);
        $chapter = Chapter::where('slug', $chapterSlug)->where('course_id', $curso->id)->firstOrFail();
        $content = Chaptercontent::where('slug', $contentSlug)->where('chapter_id', $chapter->id)->firstOrFail();

        // Obtener capítulos ordenados
        $capitulos = Chapter::where('course_id', $curso->id)->orderBy('order', 'asc')->get();

        // Verificar si el capítulo del curso del usuario ya existe
        $user_course_chapter = UserCourseChapter::where('user_course_id', $userCourse->id)
                                                ->where('chapter_id', $chapter->id)
                                                ->first();
        if ($user_course_chapter) {
            $user_course_chapter_id = $user_course_chapter->id;
        }

        // Función de menú
        $sidelad = $this->getContent($capitulos, $curso);

        // Obtener examen del curso si existe
        if (isset($curso->examcourse)) {
            $examen = $curso->examcourse->exam;
        }

        // Obtener contenido siguiente
        $ordenActual = $content->order;

        $ordenSiguiente = $ordenActual + 1;
        $sig = Chaptercontent::where('chapter_id', $chapter->id)
                            ->where('order', $ordenSiguiente)
                            ->first();

        if ($sig) {
            $url_next = "{$id}/{$sig->chapter->course->slug}/{$sig->chapter->slug}/{$sig->slug}";
        } else {
            $url_next_quiz = "{$content->chapter->course->slug}/{$content->chapter->slug}/quiz";
        }


        return view('frontpage.learn.index', [
            'examen' => $examen,
            'user_id' => $user_id,
            'chapter_id' => $chapter->id,
            'curso_id' => $curso->id,
            'quiz' => $quiz,
            'content' => $content,
            'contents' => $sidelad,
            'curso' => $curso,
            'user_course_id' => $userCourse->id,
            'user_course_chapter_id' => $user_course_chapter_id,
            'url_next' => $url_next,
            'url_next_quiz' => $url_next_quiz,
            'chapter' => $chapter,
            'content_slug' => $content->slug,
            'chapter_quiz_id' => $chapter->chapterquiz->id ?? null,
            'quiz' => false,
        ]);
    }

    // public function cursoChapterContent($id,$slug,$chapter,$content){

    //     $user_course_chapter_id=null;
    //     $menulat=null;
    //     $examen = null;
    //     $quiz=null;
    //     $url_next=null;
    //     $url_next_quiz=null;

    //     $user_id = Auth::id();
    //     $curso = Course::where('slug',$slug)->first();
    //     $userCourse = UserCourse::find($id);
    //     $chapter = Chapter::where('slug',$chapter)->where('course_id',$curso->id)->first();
    //     $content = Chaptercontent::where('slug',$content)->where('chapter_id',$chapter->id)->first();


    //     //chapter crear order en tabla
    //     $capitulos = Chapter::where('course_id',$curso->id)->orderBy('order','asc')->get();



    //     $ucc = UserCourseChapter::where('user_course_id',$userCourse->id)->where('chapter_id',$chapter->id)->count();

    //     if($ucc>0){
    //         $user_course_chapter = UserCourseChapter::where('user_course_id',$userCourse->id)->where('chapter_id',$chapter->id)->first();
    //         $user_course_chapter_id = $user_course_chapter->id;
    //     }



    //     //funcion menu
    //     $sidelad = $this->getContent($capitulos,$curso);


    //     if(isset($curso->examcourse)){
    //         $examen = $curso->examcourse->exam;
    //     }


    //     //armado de contenido siguiente
    //     $ordenSiguiente = 0;
    //     //$sig = Chaptercontent::where('id','>',$content->id)->where('chapter_id',$chapter->id)->orderBy('id')->first();
    //    $contenidoActual = Chaptercontent::where('id',$content->id)->where('chapter_id',$chapter->id)->first();
    //    $ordenActual = $contenidoActual->order;

    //     $ordenSiguiente = $ordenActual+1;

    //    $sig = Chaptercontent::where('chapter_id',$chapter->id)->where('order',$ordenSiguiente)->first();



    //     //$sig = Chaptercontent::where('id','>',$content->id)->where('chapter_id',$chapter->id)->orderBy('order','desc')->first();
    //     if(isset($sig)){

    //         $url_next = $id."/".$sig->chapter->course->slug."/".$sig->chapter->slug."/".$sig->slug;
    //     }else{

    //         $url_next_quiz = $content->chapter->course->slug."/".$content->chapter->slug."/quiz";
    //     }

    //         //dd($url_next_quiz);
    //     //$cont['contenidos']['curso_slug']}}/{{$cont['contenidos']['capitulo_slug']


    //     return view('frontpage.learn.index',[
    //         'examen'=>$examen,
    //         'user_id'=>$user_id,
    //         'chapter_id'=> $chapter->id,
    //         'curso_id'=>$curso->id,
    //         'quiz'=>$quiz,
    //         'content'=>$content,
    //         'contents'=>$sidelad,
    //         'curso'=>$curso,
    //         'user_course_id'=>$userCourse->id,
    //         'user_course_chapter_id' =>$user_course_chapter_id,
    //         'url_next'=>$url_next,
    //         'url_next_quiz'=>$url_next_quiz,
    //         'chapter'=>$chapter,
    //         'content_slug'=>$content->slug,
    //         'chapter_quiz_id'=>$chapter->chapterquiz->id,
    //         'quiz'=>false,
    //     ]);
    // }

    // public function cursoChapterContentQuiz($user_course_id, $slug, $chapter, $id){

    //     $user_id = Auth::id();
    //     $url_next=null;
    //     $fin_curso = false;
    //     $user_course_chapter_id =null;
    //     $curso = Course::where('slug',$slug)->first();
    //     $userCourse = UserCourse::find($user_course_id);
    //     $chapter = Chapter::where('slug',$chapter)->where('course_id',$curso->id)->first();
    //     $menulat=null;

    //     if( UserCourseChapter::where('user_course_id',$userCourse->id)->where('chapter_id',$chapter->id)->count()>0){
    //         $user_course_chapter = UserCourseChapter::where('user_course_id',$userCourse->id)->where('chapter_id',$chapter->id)->first();
    //         $user_course_chapter_id = $user_course_chapter->id;
    //     }

    //     //chapter crear order en tabla
    //     $capitulos = Chapter::where('course_id',$curso->id)->orderBy('order','asc')->get();
    //     $sidelad = $this->getContent($capitulos,$curso);

    //     //quiz data
    //     $quizes = ChapterQuiz::where('chapter_id',$id)->get();
    //     $content=null;
    //     $tiempoquiz=0;
    //     //verificamos si el usuario tomo el quiz

    //     $total=0;
    //     $totalcorrectas = 0;
    //     $completado = false;
    //     $aprobado = false;
    //     //obtenemos el numero de preguntas
    //     $numeroPreguntas = ChapterQuiz::where('chapter_id',$chapter->id)->count();
    //     $preguntas = ChapterQuiz::where('chapter_id',$chapter->id)->get();

    //     //determinar si completo todas las preguntas
    //     foreach($preguntas as $preg){
    //         $numerContestadas = UserCourseChapterQuiz::where('user_course_chapter_id',$user_course_chapter_id)->where('chapter_quiz_id',$preg->id)->count();
    //         $total +=$numerContestadas;
    //     }

    //     if($numeroPreguntas  == $total){
    //         $completado = true;
    //     }

    //     //obtener respuestas correctas
    //     $correctas = UserCourseChapterQuiz::where('user_course_chapter_id',$user_course_chapter_id)->where('result',1)->count();


    //     //obtener tiempo quiz
    //     $ultimo_registro = UserCourseChapterQuiz::where('user_course_chapter_id',$user_course_chapter_id)->orderBy('id','desc')->first();
    //     if(isset( $ultimo_registro)){
    //         $tiempoquiz = $ultimo_registro->timequiz;
    //     }


    //     $porcentaje = round($correctas*100/$numeroPreguntas ,2);

    //     $resultado_quiz=false;
    //     if($correctas ==$numeroPreguntas){
    //         $resultado_quiz = true;
    //         $registro = UserCourseChapter::where('user_course_id',$userCourse->id)->where('chapter_id',$id)->first();
    //         $registro->save();
    //     }


    // //obtengo total de capitulos
    //     $numeroCapitulos = $capitulos = Chapter::where('course_id',$curso->id)->count();
    //     $indiceCapitulos = $capitulos = Chapter::where('course_id',$curso->id)->get();
    //     $contador=1;
    //     $capituloActual = Chaptercontent::where('chapter_id',$chapter->id)->first();
    //     $capitulosId=[];
    //     $capitulosIdOrder=[];
    // //obtengo id de capitulos
    //     foreach($indiceCapitulos as $nc){
    //         $indice = ['chapter_id'=>$nc->id, 'order'=>$nc->order];
    //         array_push($capitulosId,$indice);
    //     }

    //     $keys = array_column($capitulosId, 'order');
    //     array_multisort($keys, SORT_ASC, $capitulosId);

    //     $coleccion = collect($capitulosId);

    //     $chapterOrderNow = Chapter::indices($coleccion,$chapter->id);
    //     $chapterNextId = Chapter::proximo($coleccion,$chapter->id);

    //     if( $chapterNextId!=0){

    //         if( $capituloActual->order <= $numeroCapitulos){


    //             $sig = Chaptercontent::where('chapter_id',$chapterNextId)->orderBy('order','asc')->first();


    //             if($sig->chapter->course->slug == $slug){
    //             $url_next = $user_course_id."/".$sig->chapter->course->slug."/".$sig->chapter->slug."/".$sig->slug;

    //             }else{
    //                 $fin_curso=true;
    //             }
    //         }else{
    //             $fin_curso=true;
    //         }

    //     }else{
    //         $fin_curso=true;
    //     }



    //     if(isset($curso->examcourse)){
    //         $examen = $curso->examcourse->exam;
    //     }


    //     return view('frontpage.learn.index',[
    //         'examen'=>$examen,
    //         'resultado_quiz' =>$resultado_quiz,
    //         'numero_preguntas'=>$numeroPreguntas,
    //         'correctas'=>$correctas,
    //         'completado'=>$completado,
    //         'user_id'=>$user_id,
    //         'chapter_id'=> $chapter->id,
    //         'curso_id'=>$curso->id,
    //         'quizes'=>$quizes,
    //         'content'=>$content,
    //         'contents'=>$sidelad,
    //         'curso'=>$curso,
    //         'quiz_chapter_id'=>$id,
    //         'user_course_id'=>$userCourse->id,
    //         'user_course_chapter_id' =>$user_course_chapter_id,
    //         'porcentaje'=>$porcentaje,
    //         'tiempoquiz'=>$tiempoquiz,
    //         'url_next'=>$url_next,
    //         'fin_curso' => $fin_curso,
    //         'content_slug'=>null,
    //         'chapter'=>$chapter,
    //         'chapter_quiz_id'=>$chapter->chapterquiz->id,
    //         'quiz'=>true,
    //     ]);
    // }

    // public function setQuestion(Request $request){
    //     $user_id = Auth::id();

    //     $respuesta = 0;
    //     $resultado = ChapterQuizOption::where('id',$request->optionid)->first();

    //     if($resultado->estado==1){
    //         $respuesta = 1;
    //     }
    //     $ucqo = new UserCourseChapterQuiz();
    //     $ucqo->chapter_quiz_id = $request->quizid;
    //     $ucqo->user_course_chapter_id = $request->user_course_chapter_id;
    //     $ucqo->quiz_question_option_id = $request->optionid;
    //     $ucqo->result = $respuesta;
    //     $ucqo->timequiz = $request->tiempo;

    //     $ucqo->save();

    //     //calculo de puntos
    //     $total=0;
    //     $completado = false;
    //     //obtenemos el numero de preguntas

    //     $numeroPreguntas = ChapterQuiz::where('chapter_id',$request->chapter_id)->count();

    //     $preguntas = ChapterQuiz::where('chapter_id',$request->chapter_id)->get();

    //     foreach($preguntas as $preg){

    //         $numerContestadas = UserCourseChapterQuiz::where('user_course_chapter_id',$request->user_course_chapter_id)->where('chapter_quiz_id',$preg->id)->count();
    //         $total += $numerContestadas;
    //     }

    //     if($numeroPreguntas  == $total){
    //         $completado = true;
    //     }

    //     $correctas = UserCourseChapterQuiz::where('user_course_chapter_id',$request->user_course_chapter_id)->where('result',1)->count();

    //     $porcentaje = round($correctas*100/$numeroPreguntas ,2);

    //     if($completado &&  $porcentaje > 75){
    //         $registro = UserCourseChapter::where('user_course_id',$request->user_course_id)->where('chapter_id',$request->chapter_id)->first();
    //         $registro->quiz_result= 1;
    //         $registro->save();
    //     }

    //     return response()->json(['rpta'=>'ok','completado'=>$completado,'np'=>$numeroPreguntas,'nc'=>$total]);

    // }


    public function cursoChapterContentQuiz($user_course_id, $slug, $chapter_slug, $id) {

        $user_id = Auth::id();
        $url_next = null;
        $fin_curso = false;
        $user_course_chapter_id = null;

        $curso = Course::where('slug', $slug)->first();
        $userCourse = UserCourse::find($user_course_id);
        $chapter = Chapter::where('slug', $chapter_slug)->where('course_id', $curso->id)->first();

        if ($userCourse && $chapter) {
            $user_course_chapter = UserCourseChapter::where('user_course_id', $userCourse->id)
                                                    ->where('chapter_id', $chapter->id)
                                                    ->first();
            if ($user_course_chapter) {
                $user_course_chapter_id = $user_course_chapter->id;

                // Eliminar respuestas previas del usuario
                if(UserCourseChapter::where('user_course_id', $userCourse->id)->where('chapter_id', $chapter->id)->first()->quiz_result == 0) {
                    UserCourseChapterQuiz::where('user_course_chapter_id', $user_course_chapter_id)->delete();
                }

            }

            // Obtener los capítulos ordenados
            $capitulos = Chapter::where('course_id', $curso->id)->orderBy('order', 'asc')->get();
            $sidelad = $this->getContent($capitulos, $curso);

            // Obtener datos del quiz
            $quizes = ChapterQuiz::where('chapter_id', $id)->get();
            $content = null;
            $tiempoquiz = 0;

            // Verificar si el usuario tomó el quiz
            $numeroPreguntas = ChapterQuiz::where('chapter_id', $chapter->id)->count();
            $totalContestadas = UserCourseChapterQuiz::where('user_course_chapter_id', $user_course_chapter_id)
                                ->whereIn('chapter_quiz_id', ChapterQuiz::where('chapter_id', $chapter->id)->pluck('id'))
                                ->count();

            $completado = $numeroPreguntas == $totalContestadas;
            $correctas = UserCourseChapterQuiz::where('user_course_chapter_id', $user_course_chapter_id)
                        ->where('result', 1)
                        ->count();

            // Obtener el tiempo del quiz
            $ultimo_registro = UserCourseChapterQuiz::where('user_course_chapter_id', $user_course_chapter_id)
                                ->orderBy('id', 'desc')
                                ->first();
            if ($ultimo_registro) {
                $tiempoquiz = $ultimo_registro->timequiz;
            }

            $porcentaje = $numeroPreguntas > 0 ? round(($correctas * 100) / $numeroPreguntas, 2) : 0;

            $resultado_quiz = false;
            if ($completado && $correctas == $numeroPreguntas) {
                $resultado_quiz = true;
                $registro = UserCourseChapter::where('user_course_id', $userCourse->id)
                            ->where('chapter_id', $id)
                            ->first();
                if ($registro) {
                    $registro->save();
                }
            }

            // Obtener el siguiente capítulo
            $capitulosId = $capitulos->pluck('id')->toArray();
            $chapterOrderNow = array_search($chapter->id, $capitulosId);
            $chapterNextId = $capitulosId[$chapterOrderNow + 1] ?? null;

            if ($chapterNextId) {
                $sig = Chaptercontent::where('chapter_id', $chapterNextId)->orderBy('order', 'asc')->first();
                if ($sig && $sig->chapter->course->slug == $slug) {
                    $url_next = "{$user_course_id}/{$sig->chapter->course->slug}/{$sig->chapter->slug}/{$sig->slug}";
                } else {
                    $fin_curso = true;
                }
            } else {
                $fin_curso = true;
            }


            $examen = $curso->examcourse->exam ?? null;


            return view('frontpage.learn.index', [
                'examen' => $examen,
                'resultado_quiz' => $resultado_quiz,
                'numero_preguntas' => $numeroPreguntas,
                'correctas' => $correctas,
                'completado' => $completado,
                'user_id' => $user_id,
                'chapter_id' => $chapter->id,
                'curso_id' => $curso->id,
                'quizes' => $quizes,
                'content' => $content,
                'contents' => $sidelad,
                'curso' => $curso,
                'quiz_chapter_id' => $id,
                'user_course_id' => $userCourse->id,
                'user_course_chapter_id' => $user_course_chapter_id,
                'porcentaje' => $porcentaje,
                'tiempoquiz' => $tiempoquiz,
                'url_next' => $url_next,
                'fin_curso' => $fin_curso,
                'content_slug' => null,
                'chapter' => $chapter,
                'chapter_quiz_id' => $chapter->chapterquiz->id,
                'quiz' => true,
            ]);
        }

        return redirect()->back()->withErrors(['message' => 'Curso o capítulo no encontrado']);
    }



    public function setQuestion(Request $request) {
        $user_id = Auth::id();

        // Obtener el resultado de la opción seleccionada
        $resultado = ChapterQuizOption::find($request->optionid);
        $respuesta = $resultado && $resultado->estado == 1 ? 1 : 0;

        // Registrar la respuesta del usuario
        $ucqo = new UserCourseChapterQuiz();
        $ucqo->chapter_quiz_id = $request->quizid;
        $ucqo->user_course_chapter_id = $request->user_course_chapter_id;
        $ucqo->quiz_question_option_id = $request->optionid;
        $ucqo->result = $respuesta;
        $ucqo->timequiz = $request->tiempo;
        $ucqo->save();

        // Log de la respuesta del usuario
        Log::info('UserCourseChapterQuiz registrado', ['ucqo' => $ucqo]);

        // Calcular el total de preguntas y respuestas
        $numeroPreguntas = ChapterQuiz::where('chapter_id', $request->chapter_id)->count();


        $totalContestadas = UserCourseChapterQuiz::where('user_course_chapter_id', $request->user_course_chapter_id)
                            ->whereIn('chapter_quiz_id', ChapterQuiz::where('chapter_id', $request->chapter_id)->pluck('id'))
                            ->count();

        //dd($numeroPreguntas." -- ".$totalContestadas);

        $completado = $numeroPreguntas == $totalContestadas;

        // Calcular el porcentaje de respuestas correctas
        $correctas = UserCourseChapterQuiz::where('user_course_chapter_id', $request->user_course_chapter_id)
                    ->where('result', 1)
                    ->count();
        $porcentaje = $numeroPreguntas > 0 ? round(($correctas * 100) / $numeroPreguntas, 2) : 0;

        // Actualizar el resultado del quiz si se ha completado y el porcentaje es mayor a 75%
        if ($completado && $porcentaje > 75) {
            $registro = UserCourseChapter::where('user_course_id', $request->user_course_id)
                        ->where('chapter_id', $request->chapter_id)
                        ->first();
            if ($registro) {
                $registro->quiz_result = 1;
                $registro->save();

                // Log del registro actualizado
                Log::info('UserCourseChapter actualizado', ['registro' => $registro]);
            }
        }

        return response()->json(['rpta' => 'ok', 'completado' => $completado, 'np' => $numeroPreguntas, 'nc' => $totalContestadas]);
    }


    public function resetChapter(Request $request){
        $user_id = Auth::id();
        $registro = UserCourseChapterQuiz::where('user_course_chapter_id', $request->user_course_chapter_id)->delete();
        return response()->json(['rtpa'=>'ok','mensaje'=>$registro]);
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
        $numero_intentos=0;
        $numeroVecesCurso = 0;
        $estado_curso=0;
        $reinicios =0;
        $tiempo_examen =0;

        $user_id = Auth::id();
        $user = User::find($user_id);

        $curso = Course::where('slug',$slug)->first();
        //verificamos si ya registro finalizacion del contenido
        $existe_registro = UserCourse::where('user_id',$user_id)->where('course_id',$curso->id)->orderBy('id','desc')->first();

        if($existe_registro->finalizado==0){
        $uc = UserCourse::where('user_id',$user_id)->where('course_id',$curso->id)->orderBy('id','desc')->first();
        $uc->finalizado = 1;
        $uc->save();
        }

        $userCourse = UserCourse::where('user_id',$user_id)->where('course_id',$curso->id)->orderBy('id','desc')->first();

        $userCourseChapter = UserCourseChapter::where('user_course_id',$userCourse->id)->first();

        if(isset($userCourseChapter)){
            $user_course_chapter_id = $userCourseChapter->id;
            $userCourseChapterContent = UserCourseChapterContent::where('user_course_chapter_id',$userCourseChapter->id)->first();
        }

        if(isset($userCourseChapterContent)){
            $user_course_chapter_content_id = $userCourseChapterContent->id;
        }


        $capitulos = Chapter::where('course_id',$curso->id)->orderBy('order','asc')->get();
        //obtenemos el contenido del primer  capitulo
        $content = Chaptercontent::where('chapter_id',$capitulos[0]->id)->first();

        $sig = Chaptercontent::where('id','>',$content->id)->where('chapter_id',$content->chapter->id)->orderBy('id')->first();

        if(isset($sig)){
            $url_next = $userCourse->id."/".$sig->chapter->course->slug."/".$sig->chapter->slug."/".$sig->slug;
        }else{
            $url_next_quiz = $content->chapter->course->slug."/".$content->chapter->slug."/quiz";
        }

        $sidelad = $this->getContent($capitulos,$curso);
        $exam = Exam::find($id);
        //reinicio de examen

            $registroExamen = UserCourseExam::where('exam_id',$id)->where('user_course_id',$userCourse->id)->first();
            if ($registroExamen) {
            if($registroExamen->intento == null && $registroExamen->resultado == 0 && $registroExamen->complete == null){
                UserCourseExamResult::where('user_course_exam_id',$registroExamen->id)->delete();
            }
        }

        //comprobar si tomo examen
        if(UserCourseExam::where('exam_id',$id)->where('user_course_id',$userCourse->id)->count()>0){

            $tomo_examen = UserCourseExam::where('exam_id',$id)->where('user_course_id',$userCourse->id)->first();
            $comprobar = UserCourse::where('user_id',$user_id)->where('course_id',$curso->id)->orderBy('id','desc')->first();


            $total_preguntas = ExamQuestion::where('exam_id',$id)->count();
            $total_respondidas = UserCourseExamResult::where('user_course_exam_id', $tomo_examen->id)->count();
            $total_correctas = UserCourseExamResult::where('user_course_exam_id', $tomo_examen->id)->where('result','1')->count();
            $porcentaje = round($total_correctas*100/$total_preguntas ,2);
            $completo_examen = $tomo_examen->complete;
            $numero_intentos = $comprobar->intentos;
            $estado_curso = $comprobar->aprobado;
            $numeroVecesCurso = UserCourse::where('user_id',$user_id)->where('course_id',$curso->id)->count();
            $reinicios = $comprobar->reiniciado;

        $tiempo_examen =  UserCourse::tiempoExamen($tomo_examen->tiempo);


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
            'numero_intentos' =>$numero_intentos,
            'numero_veces_curso' => $numeroVecesCurso,
            'estado_curso'=>$estado_curso,
            'reinicios' => $reinicios,
            'tiempo_examen'=>$tiempo_examen
        ]);

    }

    public function congratulation($id){

        $user_id = Auth::id();
       // $curso = Course::where('slug',$slug)->first();
        $userCourse = UserCourse::find($id);

        $curso = $userCourse->course;

        //chapter crear order en tabla
        $capitulos = Chapter::where('course_id',$userCourse->course->id)->orderBy('order','asc')->get();
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
        return view('frontpage.exam.exitos',['user_course'=>$userCourse,'examen'=>$exam,'quiz'=>$quiz,'contenidos'=>$menulat,'curso'=>$curso,'user_course_id'=>$userCourse->id]);
    }

    public function fail($id){



        $user_id = Auth::id();
        $userCourse = UserCourse::find($id);
        $curso = $userCourse->course;


        //chapter crear order en tabla
        $capitulos = Chapter::where('course_id',$curso->id)->orderBy('order','asc')->get();




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
        $resultado = 2;
        $dias = UserCourse::dayleft($id);

        return view('frontpage.usuario.outcome',[
            'examen'=>$exam,
            'quiz'=>$quiz,
            'contenidos'=>$menulat,
            'curso'=>$curso,
            'user_course_id'=>$userCourse->id,

            'resultado'=>$resultado,
            'user_course'=>$userCourse,
            'capitulos'=>$capitulos,
            'dias'=>$dias,
            'user_id' =>$user_id

        ]);
    }


    public function expired($id){



        $user_id = Auth::id();
        $userCourse = UserCourse::find($id);
        $curso = $userCourse->course;


        //chapter crear order en tabla
        $capitulos = Chapter::where('course_id',$curso->id)->orderBy('order','asc')->get();




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
        $resultado = 3;
        $dias = UserCourse::dayleft($id);

        return view('frontpage.usuario.outcome',[
            'examen'=>$exam,
            'quiz'=>$quiz,
            'contenidos'=>$menulat,
            'curso'=>$curso,
            'user_course_id'=>$userCourse->id,

            'resultado'=>$resultado,
            'user_course'=>$userCourse,
            'capitulos'=>$capitulos,
            'dias'=>$dias,
            'user_id' =>$user_id

        ]);
    }


    public function setExam(Request $request){
        $intentos = 0;
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


        if(UserCourseExam::where('user_course_id',$request->user_course_id)->where('exam_id',$request->exam_id)->count()>0){
            $registro = UserCourseExam::where('user_course_id',$request->user_course_id)->where('exam_id',$request->exam_id)->first();

           // $registro->save();
        }


        if($porcentaje>=75){
            $usercourse = UserCourse::where('id',$request->user_course_id)->first();
            $usercourse->aprobado = 1;
            // if($intentos ==3){
            //     $usercourse->intentos = 1;
            // }

            $user_email = $usercourse->user->email;

            $data = [
                'nombre'=>$usercourse->user->name,
                'titulo'=>$usercourse->course->titulo,
                'responsable'=>$usercourse->course->responsable,
                'user_course_id'=>$request->user_course_id,
                'course_id'=>$usercourse->course->id,
                'banner'=>$usercourse->course->banner
            ];

            Mail::to($user_email)->send(new Aprobado($data));

            $usercourse->save();
        }else{
            $usercourse = UserCourse::where('id',$request->user_course_id)->first();
            $usercourse->aprobado = 0;
            $usercourse->intentos+= 1;
            // if($intentos ==3){
            //     $usercourse->intentos = 1;
            // }
            $usercourse->save();


            $user_email = $usercourse->user->email;

            if($usercourse->intentos == 3){
            //enviar mail
                $data = [
                    'nombre'=>$usercourse->user->name,
                    'titulo'=>$usercourse->course->titulo,
                    'responsable'=>$usercourse->course->responsable,
                    'user_course_id'=>$request->user_course_id,
                    'course_id'=>$usercourse->course->id,
                    'banner'=>$usercourse->course->banner
                ];

                Mail::to($user_email)->send(new Rechazado($data));

            }
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

        $user_course_exam = UserCourseExam::find($request->user_course_id);

        $total_preguntas = ExamQuestion::where('exam_id',$request->exam_id)->get();
        $total_respondidas = UserCourseExamResult::where('user_course_exam_id',$request->user_course_exam_id)->get();


        foreach($total_preguntas as $preg){

            $opciones=null;
            foreach($preg->examquestionoptions as $opcion){
                $user_responde=false;
                $acierto = false;
                $correcto = false;
                $urespuesta = null;

                if($opcion->resultado==1){
                    $correcto = true;
                }

                if(UserCourseExamResult::where('exam_question_option_id',$opcion->id)->where('user_course_exam_id',$request->user_course_exam_id)->count()>0){


                     $urespuesta = UserCourseExamResult::where('exam_question_option_id',$opcion->id)->where('user_course_exam_id',$request->user_course_exam_id)->first();

                     if( $urespuesta->result == 1 && $opcion->resultado==1){
                         $acierto = true;
                     }else{
                        $user_responde = true;
                     }
                }


                $opciones[]=[
                    'id'=>$opcion->id,
                    'name'=> $opcion->opcion,
                    'responde'=>$user_responde,
                    'acierto'=>$acierto,
                    'correcto'=>$correcto,
                    'exam_question_option_id'=>@$urespuesta->exam_question_option_id,
                    'opcion_resultado'=>@$urespuesta->result,
                    '$resultado_q'=>$opcion->resultado

                ];

            }

            $preguntas[]=[
                'question_id'=>$preg->id,
                'question_name'=>$preg->question,
                'opciones'=>$opciones,
                'user_course_exam_id'=>$request->user_course_exam_id,
                'ucer_id' =>@$user_course_exam->id


            ];

        }
        return response()->json($preguntas);
    }

    public function restartCourse(Request $request){

        $user_id = Auth::id();

        $user_course_id = $request->user_course_id;
         if(UserCourse::where('parent_id',$user_course_id)->count()>0){
            return response()->json(['rpta'=>'error','mensaje'=>'The course has already been restarted']);
         }




        if(UserCourse::where('user_id',$request->user_id)->where('course_id',$request->course_id)->where('aprobado','1')->count()>0){

            return response()->json(['rpta'=>'error','mensaje'=>'You already have the course approved']);
        }


        $curso = new UserCourse();
        $curso->user_id = $user_id;
        $curso->course_id = $request->course_id;
        $curso->fecha_inicio = Carbon::now()->format('Y-m-d');
        $curso->dias_activo = 15;
        $curso->reiniciado = 1;
        $curso->parent_id = $user_course_id;
        $curso->save();

        //verificar si aprobo



        return response()->json(['rpta'=>'ok']);

    }

    public function certificado($id,$user_course_id){
        $curso = Course::find($id);
        $user_id = Auth::id();
        $user = User::find($user_id);
        $user_course = UserCourse::find($user_course_id);
        $certificado = $curso->certification->image;

        // $pdf = PDF::loadView('pdf.index', ['curso'=>$curso, 'user'=>$user,'user_course'=>$user_course,'certificado'=>$certificado ])->setOptions([
        //     'isHtml5ParserEnabled' => true,
        //     'isRemoteEnabled' => true,
        //     'dpi' =>137,
        // ]);

        // $pdf->setPaper('a4', 'landscape')->render();

        // return $pdf->stream();
        // return $pdf->setPaper('a4', 'landscape')->dpi()stream('certificate'.uniqid().'.pdf');
        //$output =  $pdf->output('employment.pdf');
        // return view('pdf.index',['curso'=>$curso,'user'=>$user]);


        if($curso->certification_id==1){
            $pdf = PDF::loadView('pdf.certificado1', ['curso'=>$curso, 'user'=>$user,'user_course'=>$user_course,'certificado'=>$certificado ])->setOptions([
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true,
                'dpi' =>180,
            ]);
        }

        if($curso->certification_id==2){
            $pdf = PDF::loadView('pdf.certificado2', ['curso'=>$curso, 'user'=>$user,'user_course'=>$user_course,'certificado'=>$certificado ])->setOptions([
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true,
                'dpi' =>180,
            ]);
        }

        if($curso->certification_id==3){
            $pdf = PDF::loadView('pdf.certificado3', ['curso'=>$curso, 'user'=>$user,'user_course'=>$user_course,'certificado'=>$certificado ])->setOptions([
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true,
                'dpi' =>180,
            ]);
        }

        if($curso->certification_id==4){
            $pdf = PDF::loadView('pdf.certificado4', ['curso'=>$curso, 'user'=>$user,'user_course'=>$user_course,'certificado'=>$certificado ])->setOptions([
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true,
                'dpi' =>180,
            ]);
        }
        $pdf->setPaper('a4')->render();

        return $pdf->stream();

    }


    public function template($id,$user_course_id){

        $curso = Course::find($id);
        $user_id = Auth::id();
        $user = User::find($user_id);
        $user_course = UserCourse::find($user_course_id);
        $certificado = $curso->certification->image;

        if($curso->certification_id==1){
            $pdf = PDF::loadView('pdf.certificado1', ['curso'=>$curso, 'user'=>$user,'user_course'=>$user_course,'certificado'=>$certificado ])->setOptions([
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true,
                'dpi' =>180,
            ]);
        }

        if($curso->certification_id==2){
            $pdf = PDF::loadView('pdf.certificado2', ['curso'=>$curso, 'user'=>$user,'user_course'=>$user_course,'certificado'=>$certificado ])->setOptions([
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true,
                'dpi' =>180,
            ]);
        }

        if($curso->certification_id==3){
            $pdf = PDF::loadView('pdf.certificado3', ['curso'=>$curso, 'user'=>$user,'user_course'=>$user_course,'certificado'=>$certificado ])->setOptions([
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true,
                'dpi' =>180,
            ]);
        }

        if($curso->certification_id==4){
            $pdf = PDF::loadView('pdf.certificado4', ['curso'=>$curso, 'user'=>$user,'user_course'=>$user_course,'certificado'=>$certificado ])->setOptions([
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true,
                'dpi' =>180,
            ]);
        }
        $pdf->setPaper('a4')->render();

        return $pdf->stream();

       // return view('pdf.certificado1',['curso'=>$curso, 'user'=>$user,'user_course'=>$user_course,'certificado'=>$certificado ]);
    }
}
