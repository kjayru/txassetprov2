<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Chapter;
use App\Models\Chaptercontent;

class CourseController extends Controller
{
    public function index(){
        $cursos = Course::orderBy('id','desc')->take(3)->get();
        return view('frontpage.cursos.index',['cursos'=>$cursos]);
    }

    public function todos(){
        $cursos = Course::orderBy('id','desc')->get();

        return view('frontpage.cursos.cursos',['cursos'=>$cursos]);
    }

    public function curso($slug){

        $curso = Course::where('slug',$slug)->first();
        $relacionados = Course::where('id','<>',$curso->id)->orderBy('id','desc')->take(3)->get();


        return view('frontpage.cursos.detalle',['curso'=>$curso,'relacionados'=>$relacionados]);
    }

    public function cursoContent(Request $request){

            $curso = Course::find($request->id);
            $contenidos=null;

            foreach($curso->chapters as $cap){

              $contenidos[] =  [

                'id'=>$cap->id,
                'course_id'=>$curso->id,
                'course_slug'=>$curso->slug,
                'titulo'=>$cap->title,
                'video'=>$cap->video,
                'reading'=>$cap->reading,
                'audio'=>$cap->audio,
                'contenidos'=>$cap->chaptercontents,
                'chapter_slug'=>$cap->slug,
                'quiz'=>@$cap->quiz

              ];

            }

        return response()->json(["contents"=>$contenidos]);
    }

    public function cursoChapter($chapter,$content){
       // $curso = Course::find($request->id);

        return view('frontpage.cursos.datoscurso');
    }

    public function cursoChapterContent($slug,$chapter,$content){

        $curso = Course::where('slug',$slug)->first();
        $chapter = Chapter::where('slug',$chapter)->where('course_id',$curso->id)->first();

        $content = Chaptercontent::where('slug',$content)->where('chapter_id',$chapter->id)->first();
       $menulat=null;

        //chapter crear order en tabla
       $capitulos = Chapter::where('course_id',$curso->id)->orderBy('order','asc')->get();



       foreach($capitulos as $cap){
        $menucont=null;

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
                    'contenidos'=>$menucont
            ];

       }


        return view('frontpage.cursos.datoscurso',['content'=>$content,'contenidos'=>$menulat,'curso'=>$curso]);
    }
}
