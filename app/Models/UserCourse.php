<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
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

    public static function completeChapter($id,$user_id){
        $completo=false;
        $usercourse = UserCourse::where('course_id',$id)->where('user_id',$user_id)->first();

        $courseChapter = UserCourseChapter::where('user_course_id',$usercourse->id)->count();

        return $courseChapter;
    }

    public static function complete($id,$user_id){
        $completo=false;
        $usercourse = UserCourse::where('course_id',$id)->where('user_id',$user_id)->first();

        $courseChapter = UserCourseChapter::where('user_course_id',$usercourse->id)->count();


        $capitulos = Chapter::where('course_id',$id)->count();

        if($capitulos == $courseChapter){
            $completo=true;
            return $completo;
        }

        return $completo;
    }

    public static function leftdays($id,$user_id){
        $usercourse = UserCourse::where('course_id',$id)->where('user_id',$user_id)->first();


        return $usercourse->dias_activo;
    }


    public static function contenidoActivo($course_id,$chapter_id,$content_id){

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

    public static function capituloActivo($course_id,$chapter_id){

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
        $valor =  Carbon::parse($tiempo)->floatDiffInMinutes('02:00');

        return $valor;
    }

}
