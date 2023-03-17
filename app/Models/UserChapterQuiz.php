<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserChapterQuiz extends Model
{
    use HasFactory;

    public function userChapterQuizOptions(){
        return $this->hasMany(UserChapterQuizOption::class);
    }
}
