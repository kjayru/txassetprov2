<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\UserCourse;
use App\Models\ExamCourse;

class CreateUserCourseExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_course_exams', function (Blueprint $table) {
            $table->id();
           

            $table->unsignedBigInteger('user_course_id');
            $table->foreign('user_course_id','user_course_id_pk_foreign')->references('id')->on('user_courses');
           

            $table->unsignedBigInteger('exam_id');
            $table->foreign('exam_id','exam_id_foreign')->references('id')->on('exams');
           
            $table->integer('tiempo');
            $table->integer('intentos');
            $table->integer('resultado')->default(0);
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
        Schema::dropIfExists('user_course_exams');
    }
}
