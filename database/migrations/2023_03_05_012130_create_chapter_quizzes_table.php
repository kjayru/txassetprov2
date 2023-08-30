<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Chapter;
use App\Models\Quiz;
class CreateChapterQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapter_quizzes', function (Blueprint $table) {
            $table->id();
          
            $table->unsignedBigInteger('chapter_id');
            $table->foreign('chapter_id','chapter_id_pk_foreign')->references('id')->on('chapters');

           
            $table->string('question');
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
        Schema::dropIfExists('chapter_quizzes');
    }
}
