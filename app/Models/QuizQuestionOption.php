<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizQuestionOption extends Model
{
    use HasFactory;
    public function quizQuestion(){
        return $this->belongsTo(QuizQuestion::class);
    }
}
