<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informations', function (Blueprint $table) {
            $table->increments('id');


            $table->string('lastname');
            $table->string('firstname');
            $table->string('mi');
            $table->string('date');
            $table->string('address');
            $table->string('apartment');
            $table->string('city');
            $table->string('state');
            $table->string('zipcode');
            $table->string('phone');
            $table->string('email');
            $table->string('birthday');
            $table->string('socialnumber');
            $table->string('placebirth');
            $table->string('appliedpay');
            $table->string('whichshift');
            $table->string('whichday');
            $table->string('citizen');
            $table->string('authorized');
            $table->string('when')->nullable();
            $table->string('explain1')->nullable();
            $table->string('explain2')->nullable();
            $table->string('worked');
            $table->string('convicted');
            $table->string('indictment');
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
        Schema::dropIfExists('informations');
    }
}
