<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');
            $table->string('email');
            $table->string('item_number')->nullable();
            $table->string('item_name');

            $table->decimal('item_price',10,2);
            $table->string('item_price_currency');
            $table->decimal('paid_amount',10,2);
            $table->string('paid_amount_currency');

            $table->string('txn_id');
            $table->string('checkout_session_id');

            $table->string('payment_status');

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');

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
        Schema::dropIfExists('orders');
    }
}
