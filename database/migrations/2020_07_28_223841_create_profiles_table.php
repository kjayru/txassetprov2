<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->string('gender');
            $table->string('birthday');
            $table->string('ssn');
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('zipcode');
            $table->string('drivernumber');
            $table->string('driverstate');
            $table->string('phone');
            $table->string('email');
            $table->string('organization');
            $table->string('emergencycontact');
            $table->string('emergencyphone');
            $table->string('relationship');
            $table->string('handguncaliber')->nullable();
            $table->string('handguntype')->nullable();
            $table->string('handgunrental')->nullable();
            $table->string('shootingshotgun')->nullable();
            $table->string('shotgungauce')->nullable();
            $table->string('shotgunrental')->nullable();

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
        Schema::dropIfExists('profiles');
    }
}
