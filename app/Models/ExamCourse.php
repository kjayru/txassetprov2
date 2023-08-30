<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamCourse extends Model
{
    use HasFactory;

    public function exam(){
        return $this->belongsTo(Exam::class);

    }

    public function course(){
        return $this->belongsTo(Course::class);
    }
}
