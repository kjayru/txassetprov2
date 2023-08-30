<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Quiz;
class CreateQuizQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_questions', function (Blueprint $table) {
            $table->bigIncrements('id');
          // $table->foreignIdFor(Quiz::class)->constrained('quiz_id_foreign')->index();
          $table->unsignedBigInteger('quiz_id');
            $table->foreign('quiz_id','quiz_id_foreign')->references('id')->on('quizes');
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
        Schema::dropIfExists('quiz_questions');
    }
}
