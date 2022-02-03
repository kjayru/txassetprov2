<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('forms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("yourname");
            $table->string("socialnumber");
            $table->string("address");
            $table->string("country");
            $table->string("citystate");
            $table->string("telephone");
            $table->string("birthday");
            $table->text("condicional");
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
        Schema::dropIfExists('forms');
    }
}
