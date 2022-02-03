<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMilitariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('militaries', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedInteger('information_id');
            $table->foreign('information_id')->references('id')->on('informations');


            $table->string('branch')->nullable();
            $table->string('from')->nullable();
            $table->string('to')->nullable();
            $table->string('rank')->nullable();
            $table->string('type')->nullable();
            $table->text('explain')->nullable();

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
        Schema::dropIfExists('militaries');
    }
}
