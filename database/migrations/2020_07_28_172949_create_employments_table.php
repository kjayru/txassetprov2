<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmploymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employments', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedInteger('information_id');
            $table->foreign('information_id')->references('id')->on('informations');


            $table->string('company')->nullable();
            $table->string('phoneemp')->nullable();
            $table->string('addressempl')->nullable();
            $table->string('supervisor')->nullable();
            $table->string('jobtitle')->nullable();
            $table->string('starting')->nullable();
            $table->string('ending')->nullable();
            $table->string('from')->nullable();
            $table->string('to')->nullable();
            $table->string('reason')->nullable();
            $table->string('references')->nullable();

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
        Schema::dropIfExists('employments');
    }
}
