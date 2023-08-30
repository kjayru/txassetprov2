<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\ChapterQuiz;
use App\Models\UserCourseChapter;
use App\Models\QuizQuestion;
use App\Models\QuizQuestionOption;
class CreateUserCourseChapterQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_course_chapter_quizzes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ChapterQuiz::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(UserCourseChapter::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(QuizQuestion::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(QuizQuestionOption::class)->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('user_course_chapter_quizzes');
    }
}
