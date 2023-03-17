<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCourseExam extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function course(){
        return $this->belongsTo(Course::class);

    }
    public function quiz(){
        return $this->belongsTo(Quiz::class);
    }

    public function userCourseExamOptions(){
        return $this->hasMany(UserCourseExamOption::class);
    }
}
