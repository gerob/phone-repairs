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
            $table->integer('customer_id');
            $table->integer('device_id');

            $table->string('store_number');
            $table->string('color');
            $table->string('serial_number');
            $table->string('carrier');
            $table->text('description');
            $table->text('claim');
            $table->string('claim_number');
            $table->integer('warranty_years');
            $table->string('services');

            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('device_id')->references('id')->on('devices');
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
