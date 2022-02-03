<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educations', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedInteger('information_id');
            $table->foreign('information_id')->references('id')->on('informations');

            $table->string('graduatehigh')->nullable();
            $table->string('hightschool')->nullable();
            $table->string('graduatecollage')->nullable();
            $table->string('activecard')->nullable();
            $table->string('firearm')->nullable();
            $table->string('others')->nullable();

            $table->string('highfrom')->nullable();
            $table->string('hightto')->nullable();
            $table->string('collaganame')->nullable();
            $table->string('collagefrom')->nullable();
            $table->string('collageto')->nullable();


            $table->string('officer')->nullable();
            $table->string('holster')->nullable();

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
        Schema::dropIfExists('educations');
    }
}
