<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    public function examquestions(){
        return $this->hasMany(ExamQuestion::class);
    }

    public function examcourse(){
        return $this->hasOne(ExamCourse::class);
    }
    
}
