<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCourseChapterQuiz extends Model
{
    use HasFactory;

    public function usercoursechapter(){
        return $this->belongsTo(UserCourseChapter::class,'user_course_chapter_id','id');
    }
}
