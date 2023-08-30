<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function chaptercontents(){
        return $this->hasMany(Chaptercontent::class);
    }

    public function chapterevaluations(){
        return $this->hasMany(Chapterevaluation::class);
    }

    /*public function attributes(){
        return $this->belongsToMany(Attribute::class);
    }*/

    public function attributechapters(){
        return $this->hasMany(Attributechapter::class);
    }

    public function chapterquiz(){
        return $this->hasOne(ChapterQuiz::class);
    }

    public static function capitulos($id){

        $capitulos = Chaptercontent::where('chapter_id',$id)->count();

        return $capitulos;
    }
}
