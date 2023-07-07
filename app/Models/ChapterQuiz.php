<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChapterQuiz extends Model
{
    use HasFactory;
    public function chapter(){
        return $this->belongsTo(Chapter::class);
    }
    public function chapterquizoptions(){
        return $this->hasMany(ChapterQuizOption::class);
    }

    public static function getAnswer($id){
       
       $result = null;

       if(ChapterQuizOption::where('chapter_quiz_id',$id)->count()>0){
         $answer = ChapterQuizOption::where('chapter_quiz_id',$id)->where('estado',1)->first();
         $result = $answer->option;
       }
        return $result;

    }


    


}
