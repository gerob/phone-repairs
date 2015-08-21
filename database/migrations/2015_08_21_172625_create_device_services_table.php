<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeviceServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('service_id')->unsigned();

            $table->integer('price')->unsigned();
            $table->string('upc');

            $table->timestamps();
            $table->foreign('service_id')->references('id')->on('services');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('device_services');
    }
}
