<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_orders', function (Blueprint $table) {
            $table->id();
            $table->text('course');
            $table->integer('user_id');
            $table->string('name');
            $table->string('email');
            $table->string('price');
            $table->string('order_id');
            $table->string('currency');
            $table->string('amount');
            $table->string('txn_id');
            $table->string('checkout_session_id');
            $table->string('payment_status');
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
        Schema::dropIfExists('course_orders');
    }
}
