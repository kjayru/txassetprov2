<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billings', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');
            $table->string('lastname');
            $table->string('email');
            $table->string('phone');
            $table->string('other_phone')->nullable();
            $table->string('type_address');
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('colony')->nullable();
            $table->string('zipcode');
            $table->integer('status');

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
        Schema::dropIfExists('billings');
    }
}
