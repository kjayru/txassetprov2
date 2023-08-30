<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\ExamQuestion;
class CreateExamQuestionOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_question_options', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ExamQuestion::class)->constrained()->cascadeOnDelete();
            $table->string('opcion');
            $table->integer('resultado')->nullable()->default(0);
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
        Schema::dropIfExists('exam_question_options');
    }
}
