<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCourseChapter extends Model
{
    use HasFactory;
    public function userCourse(){
        return $this->belongsTo(UserCourse::class);
    }

    public function userCourseChapterContents(){
        return $this->hasMany(UserCourseChapterContent::class);
    }

    public function usercoursechapterquizes(){
        return $this->hasMany(UserCourseChapterQuiz::class);
    }

    public static function completeChapter($user_id,$course_id){

        $usercourse = UserCourse::where('course_id',$course_id)->where('user_id',$user_id)->first();
        $courseChapter = UserCourseChapter::where('user_course_id',$usercourse->id)->count();

        $course= Course::find($course_id);
        $chapters = Chapter::where('course_id',$course->id)->count();

        $porcentaje = round($courseChapter*100/$chapters ,2);

      
        return $porcentaje;
    }
}
