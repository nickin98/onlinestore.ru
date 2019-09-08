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
            $table->increments('id');
            $table->string('customer_name');
            $table->string('street');
            $table->string('house');
            $table->string('flat')->nullable();
            $table->integer('form_payment');
            $table->boolean('near_time_delivery')->nullable();
            $table->dateTime('exact_delivery_time')->nullable();
            $table->text('comment')->nullable();
            $table->integer('status');
            $table->integer('total_price');
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers');
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
