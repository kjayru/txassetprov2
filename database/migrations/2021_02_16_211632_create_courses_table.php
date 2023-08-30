<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("titulo");
            $table->string("subtitulo");
            $table->string("slug");
            $table->string("banner")->nullable();
            $table->string("video")->nullable();
            $table->string("resumen")->nullable();
            $table->text("contenido");
            $table->double("precio",8,2);
            $table->date('disponible')->nullable();
            $table->integer('capitulos')->nullable();
            $table->string('audio')->nullable();
            $table->string('nivel')->nullable();
            $table->integer('tiempovalido')->nullable();
            $table->string('language')->nullable();
            $table->string('responsable')->nullable();
            $table->string('video')->nullable();

            $table->string('disponible')->nullable();
            $table->string('capitulos')->nullable();
            
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
        Schema::dropIfExists('courses');
    }
}
