<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserChapterQuiz extends Model
{
    use HasFactory;

    public function userChapterQuizOptions(){
        return $this->hasMany(UserChapterQuizOption::class);
    }

    public static function verificar($id,$chapter_id){

       
        $userquiz = UserCourseChapterQuiz::where('user_course_chapter_id',$id)->first();
      
       

        $activo = false;
        if(isset($userquiz)){
            if($userquiz->usercoursechapter->chapter_id == $chapter_id){
                $activo= true;
            }
        }

        return $activo;
    }
}
