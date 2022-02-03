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
}
