<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        $usercourse = UserCourse::where('course_id',$id)->where('user_id',$user_id)->first();
        
        $courseChapter = UserCourseChapter::where('user_course_id',$usercourse->id)->count();
       
        return $courseChapter;
    }

    public static function leftdays($id,$user_id){
        $usercourse = UserCourse::where('course_id',$id)->where('user_id',$user_id)->first();
        
      
        return $usercourse->dias_activo;
    }
}
