<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisclaimersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disclaimers', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedInteger('information_id');
            $table->foreign('information_id')->references('id')->on('informations');

            $table->string('signature')->nullable();
            $table->string('fileid')->nullable();
            $table->string('datedisclamer')->nullable();

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
        Schema::dropIfExists('disclaimers');
    }
}
