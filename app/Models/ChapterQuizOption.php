<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChapterQuizOption extends Model
{
    use HasFactory;
    public function chapterquiz(){
        return $this->belongsTo(ChapterQuiz::class);
    }

    public static function getResult($id){
       
        $answer = ChapterQuizOption::where('id',$id)->where('estado',1)->first();

        //dd($answer->id);
       if(isset($answer)){
        return $answer->id;
       }else{
        return 0;
       }

    }

    public static function isCorrect($id,$user_id){
        //resultado usuario
        $resultUser = UserChapterQuizOption::where('user_id',$user_id)->where('chapter_question_option_id',$id)->first();
        
        $resultOption = ChapterQuizOption::where('id',$id)->where('estado',1)->first();
        //se compara
       
        if(isset($resultUser->id)){
           if(isset($resultOption->id)){
                if($resultUser->chapter_question_option_id==$resultOption->id){
                    return $resultUser->chapter_question_option_id." verdad ".$resultOption->id;
                }else{
                    return false;
                }
            }else{
                return false;
            }            
        }
        return false;

    }

    public static function resultUser($id,$user_id){
        $resultUser = UserChapterQuizOption::where('user_id',$user_id)->where('chapter_question_option_id',$id)->first();
        
        if(isset($resultUser->id)){
        return true;
        }

        return false;

    }
}
