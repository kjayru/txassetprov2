<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\UserCourseExam;
use App\Models\ExamQuestion;
use App\Models\ExamQuestionOption;

class CreateUserCourseExamResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_course_exam_results', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(UserCourseExam::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(ExamQuestion::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(ExamQuestionOption::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_course_exam_results');
    }
}
