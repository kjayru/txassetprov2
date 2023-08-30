<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\QuizQuestion;
class CreateQuizQuestionOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_question_options', function (Blueprint $table) {
            $table->id();

            $table->string("option");
            $table->integer('resultado')->nullable()->default(0);
            $table->string('identificador');
            $table->foreignIdFor(QuizQuestion::class)->constrained()->cascadeOnDelete();

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
        Schema::dropIfExists('quiz_question_options');
    }
}
