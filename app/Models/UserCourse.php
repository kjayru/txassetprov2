<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class UserCourse extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function userCourseChapters(){
        return $this->hasMany(UserCourseChapter::class);
    }
    public function chapters()
    {
        return $this->hasMany(UserCourseChapter::class, 'user_course_id');
    }

    public static function porcentajes($course_id, $user_id) {
        $uc = UserCourse::where('course_id', $course_id)->where('user_id', $user_id)->first();
        if (!$uc) {
            return (object) ['total_respuestas' => 0, 'respuestas_correctas' => 0, 'porcentaje_correcto' => 0];
        }

        $exam = ExamCourse::where('course_id', $course_id)->first();
        if (!$exam) {
            return (object) ['total_respuestas' => 0, 'respuestas_correctas' => 0, 'porcentaje_correcto' => 0];
        }

        $ucer = UserCourseExam::where('user_course_id', $uc->id)->where('exam_id', $exam->exam_id)->first();
        if (!$ucer) {
            return (object) ['total_respuestas' => 0, 'respuestas_correctas' => 0, 'porcentaje_correcto' => 0];
        }

        $stats = DB::table('user_course_exam_results')
            ->where('user_course_exam_id', $ucer->id)
            ->selectRaw('COUNT(*) AS total_respuestas')
            ->selectRaw('SUM(CASE WHEN result = 1 THEN 1 ELSE 0 END) AS respuestas_correctas')
            ->selectRaw('ROUND((SUM(CASE WHEN result = 1 THEN 1 ELSE 0 END) * 100.0) / COUNT(*), 2) AS porcentaje_correcto')
            ->first();

        return $stats ?: (object) ['total_respuestas' => 0, 'respuestas_correctas' => 0, 'porcentaje_correcto' => 0];
    }


    public static function exam($course_id)
    {
        $exam = ExamCourse::where('course_id', $course_id)->first();
    
        return $exam ? $exam->exam_id : false;
    }

    public static function capitulo($user_course_id,$chapter_id){
        $courseChapter = UserCourseChapter::where('chapter_id',$chapter_id)->where('user_course_id',$user_course_id)->first();
        if(isset($courseChapter)){
            return true;
        }else{
            return false;
        }

    }

    public static function contenido($user_course_id,$chapter_id,$content_id){

        $courseChapter = UserCourseChapter::where('chapter_id',$chapter_id)->where('user_course_id',$user_course_id)->first();
        if(isset($courseChapter)){
                $content = UserCourseChapterContent::where('user_course_chapter_id',$courseChapter->id)->where('content_id',$content_id)->first();

                if(isset($content)){
                    return true;
                }else{
                    return false;
                }
        }else{
            return false;
        }

    }

    public static function completeChapter($id,$user_id,$user_course_id){
        $completo=false;
        $courseChapter = 0;
        $usercourse = UserCourse::find($user_course_id);

        $conteo_contenido = 0;
        $contenido_realizado = 0;

        if(UserCourseChapter::where('user_course_id',$usercourse->id)->count()>0){
            $courseChapter = UserCourseChapter::where('user_course_id',$usercourse->id)->count();

            //conteos_contenido_tomad
            $curso_capitulos = UserCourseChapter::where('user_course_id',$usercourse->id)->get();

            foreach($curso_capitulos as $cp){
                foreach($cp->userCourseChapterContents as $ucc){
                    $contenido_realizado +=1;
                }
            }
        }


        $chapters = Chapter::where('course_id',$id)->get();


        foreach($chapters as $chapter){
            foreach($chapter->chaptercontents as  $content){
                $conteo_contenido+=1;
            }
        }


        return $courseChapter;
    }



    public static function complete($id,$user_id,$user_course_id){
        $completo=false;
        $courseChapter = 0;
        $usercourse = UserCourse::find($user_course_id);
        $conteo_contenido = 0;
        $contenido_realizado = 0;

        if(UserCourseChapter::where('user_course_id',$usercourse->id)->count()>0){
                $courseChapter = UserCourseChapter::where('user_course_id',$usercourse->id)->count();

                //conteos_contenido_tomad
                $curso_capitulos = UserCourseChapter::where('user_course_id',$usercourse->id)->get();

                foreach($curso_capitulos as $cp){
                    foreach($cp->userCourseChapterContents as $ucc){
                        $contenido_realizado +=1;
                    }
                }
        }

        $capitulos = Chapter::where('course_id',$id)->count();

        $chapters = Chapter::where('course_id',$id)->get();


        foreach($chapters as $chapter){
            foreach($chapter->chaptercontents as  $content){
                $conteo_contenido+=1;
            }
        }



       // dd($conteo_contenido." - - ".$contenido_realizado);

        if($conteo_contenido == $contenido_realizado){
            $completo=true;

        }

        return $completo;
    }





    public static function leftdays($id,$user_id){
        $usercourse = UserCourse::where('course_id',$id)->where('user_id',$user_id)->first();
        return $usercourse->dias_activo;
    }


    public static function contenidoActivo($course_id,$chapter_id,$content_id,$user_course_id){

        $activo = false;
        $curso = Course::find($course_id);
        $capitulo=Chapter::find($chapter_id);
        $contenido= Chaptercontent::find($content_id);

        $currenturl = url()->full();
        $path = explode("/",$currenturl);

        if(isset($path[4]) && isset($path[5]) && isset($path[6]) ){
            if($path[4]==$curso->slug&& $path[5]==$capitulo->slug&& $path[6]==$contenido->slug){
                $activo=true;
            }
        }

        return $activo;
    }

    public static function capituloActivo($course_id,$chapter_id,$user_course_id){

        $activo = false;
        $curso = Course::find($course_id);
        $capitulo=Chapter::find($chapter_id);


        $currenturl = url()->full();
        $path = explode("/",$currenturl);

        if(isset($path[4]) && isset($path[5])){
            if($path[4]==$curso->slug&& $path[5]==$capitulo->slug){
                $activo=true;
            }
        }

        return $activo;
    }

    public static function dayleft($id){

        $uc = UserCourse::find($id);
        $fecha_inicio = $uc->created_at;
        $dias_disponible = $uc->dias_activo;
        $fecha_actual = Carbon::now();

        $fi = new Carbon($fecha_inicio);
        $dif = $fi->diffInDays($fecha_actual);


        $descuento = $dias_disponible - $dif;


        return $descuento;
    }

    public static function estadoCurso($user_course_id, $exam_id){

        $resultado = 0;

        $consulta = UserCourseExam::where('user_course_id',$user_course_id)->where('exam_id',$exam_id)->first();

            if(isset($consulta)){
            //0 = curso en proceso
            //1 = desaprobo
            if($consulta->intentos >0 && $consulta->complete==1){
                $resultado = 1;
            }
        }


        return $resultado;

    }

    public static function tiempoExamen($tiempo){


        $hora =  Carbon::parse($tiempo)->floatDiffInHours('02:00');
        $minuto =  Carbon::parse($tiempo)->floatDiffInMinutes('02:00');
        $dt = explode(":",$tiempo);


        $nhora = 0;
        $nminuto = 0;
        $nsegundo = 0;
        $valor = 0;
        //dd($tiempo.": ".$hora." - ".$minuto." - ".$segundos);

            $nhora = $dt[0]-1;
            if($nhora <0){
                $nhora = 0;
            }


            $nminuto = 60 - $dt[1];
            if($nminuto <10){
                $nminuto = "0".$nminuto;
                if($nminuto <0){
                    $nminuto = 0;
                }
            }

            if($nminuto == 60){
                $nminuto = 0;
            }

        $nsegundo = 60 - $dt[2];

        if($nhora==0 && $nminuto==0 && $nsegundo>57){
            $valor = "2:00:00";
        }else{
            $valor = $nhora.":".$nminuto.":".$nsegundo;
        }



        return $valor;

    }

    public static function procesoCaducado($id){

        $uc = UserCourse::find($id);
        $uc->caducado = 1;
        $uc->finalizado = 1;
        $uc->save();

        return true;
    }


    public static function getPorcentaje($id){
        $porcentaje = 0;
        //user_course_id
        //user_course_exam  -- user_course_exam_id
        //user_course_exam_result
        return $porcentaje;
    }
}
