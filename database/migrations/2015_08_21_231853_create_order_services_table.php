<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_order_id')->unsigned();

            $table->string('name');
            $table->integer('price')->unsigned();
            $table->string('upc');
            $table->boolean('work_completed')->default(false);
            $table->boolean('claim_completed')->default(false);

            $table->timestamps();
            $table->foreign('customer_order_id')->references('id')->on('customer_orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('order_services');
    }
}
