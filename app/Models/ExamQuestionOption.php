<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamQuestionOption extends Model
{
    use HasFactory;

    public function examquestion(){
        return $this->belongsTo(ExamQuestion::class);
    }
}
