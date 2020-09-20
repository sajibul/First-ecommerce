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
            $table->id();
            $table->unsignedBigInteger('user_id')->comment('user id');
            $table->string('customer_name',128);
            $table->string('customer_phone_number',32);
            $table->text('address');
            $table->string('city',32);
            $table->string('postal_code',16)->comment('zid_code');
            $table->decimal('total_amount',10,2);
            $table->decimal('discount_amount',10,2)->default(0.00);
            $table->decimal('paid_amount',10,2);
            $table->string('payment_status',16)->default('pending')->comment('payment success or pending');
            $table->text('payment_details')->nullable()->comment('way of payment papal bkash');
            $table->string('operational_status',16)->default('pending');
            $table->unsignedBigInteger('process_by')->nullable()->comment('who manage the order');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('process_by')->references('id')->on('users')->onDelete('cascade');
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
