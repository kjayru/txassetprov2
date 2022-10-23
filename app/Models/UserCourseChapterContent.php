<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCourseChapterContent extends Model
{
    use HasFactory;

    public function userCourseChapter(){
        return $this->BelongsTo(UserCourseChapter::class);
    }
}
