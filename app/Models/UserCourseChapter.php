<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCourseChapter extends Model
{
    use HasFactory;
    public function userCourse(){
        return $this->belongsTo(UserCourse::class);
    }

    public function userCourseChapterContents(){
        return $this->hasMany(UserCourseChapterContent::class);
    }
}
