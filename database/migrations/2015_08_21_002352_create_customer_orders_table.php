<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();

            $table->string('first_name', 64);
            $table->string('last_name', 64);
            $table->string('email');
            $table->string('address');
            $table->string('address2')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->string('phone');
            $table->string('member_type');
            $table->string('member_number')->nullable();

            $table->string('device_name');
            $table->string('store_number');
            $table->string('color');
            $table->string('serial_number');
            $table->string('passcode', 20)->nullable();
            $table->string('carrier');
            $table->text('description');
            $table->boolean('claim')->default(false);
            $table->string('claim_number')->nullable();
            $table->string('warranty_years');
            $table->boolean('confirmed')->default(false);

            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customer_orders');
    }
}
