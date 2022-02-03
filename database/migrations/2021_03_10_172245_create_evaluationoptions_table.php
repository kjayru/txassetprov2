<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationoptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluationoptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("option");
            $table->string("answer");

            $table->unsignedBigInteger('chapterevaluation_id');
            $table->foreign('chapterevaluation_id')->references('id')->on('chapterevaluations');


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
        Schema::dropIfExists('evaluationoptions');
    }
}
