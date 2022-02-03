<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('references', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedInteger('information_id');
            $table->foreign('information_id')->references('id')->on('informations');


            $table->string('fullname')->nullable();
            $table->string('relationship')->nullable();
            $table->string('companyref')->nullable();
            $table->string('phoneref')->nullable();
            $table->string('addressreference')->nullable();
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
        Schema::dropIfExists('references');
    }
}
