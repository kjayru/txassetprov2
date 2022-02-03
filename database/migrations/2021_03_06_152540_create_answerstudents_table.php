<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswerstudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answerstudents', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer("answer");

            $table->unsignedBigInteger('quiz_question_id');
            $table->foreign('quiz_question_id')->references('id')->on('quiz_questions');

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('answerstudents');
    }
}
