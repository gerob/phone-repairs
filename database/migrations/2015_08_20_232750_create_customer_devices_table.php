<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_devices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();

            $table->string('device_name', 50);
            $table->string('store_number', 50);
            $table->string('color', 20);
            $table->string('serial_number', 50);
            $table->string('passcode', 20)->nullable();
            $table->string('carrier', 50);
            $table->text('description');
            $table->boolean('claim')->default(false);
            $table->string('claim_number')->nullable();
            $table->integer('warranty_years');
            $table->string('services');

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
        Schema::drop('customer_devices');
    }
}
