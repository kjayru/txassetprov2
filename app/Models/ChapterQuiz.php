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
       
        $answer = ChapterQuizOption::where('chapter_quiz_id',$id)->where('estado',1)->first();

       
        return $answer->option;

    }


    


}
