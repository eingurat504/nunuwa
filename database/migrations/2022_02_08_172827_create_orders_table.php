<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->date('order_date');
            $table->string('email');
            $table->string('phone_no');
            $table->integer('amount');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('tracking_no');
            $table->string('city');
            $table->string('shipping_address');
            $table->string('shipping_address_2');
            $table->string('country');
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
