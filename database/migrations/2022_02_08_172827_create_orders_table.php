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
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->date('order_date');
            $table->string('tracking_no');
            $table->string('billing_first_name');
            $table->string('billing_last_name');
            $table->string('billing_email');
            $table->string('billing_phone');
            $table->string('billing_company')->nullable();
            $table->string('promo_code')->nullable();
            $table->string('billing_country');
            $table->string('billing_city');
            $table->string('billing_state');
            $table->string('billing_postalcode')->nullable();
            $table->string('billing_address_1');
            $table->string('billing_address_2')->nullable();

            $table->text('instructions')->nullable();
            $table->enum('status', [
                'PENDING',
                'ON-HOLD',
                'PROCESSING',
                'COMPLETED',
                'CANCELLED',
                'FAILED',
            ])->default('PENDING');

            $table->decimal('sub_total', 10, 2);
            $table->decimal('tax', 10, 2);
            $table->decimal('total', 10, 2);
            
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
        // Schema::table('orders', function (Blueprint $table) {
        //     $table->dropForeign(['user_id']);
        // });

        Schema::dropIfExists('orders');
    }
}
