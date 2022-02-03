<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChapterevaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapterevaluations', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string("question");

            $table->unsignedBigInteger('chapter_id');
            $table->foreign('chapter_id')->references('id')->on('chapters')->onDelete('cascade')->onUpdate('cascade');



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
        Schema::dropIfExists('chapterevaluations');
    }
}
