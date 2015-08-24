<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('device_service_id')->unsigned();

            $table->integer('count');
            $table->string('store_number');
            $table->string('device_name');
            $table->string('service_name');
            $table->string('upc');
            $table->integer('threshold')->unsigned()->default(20);

            $table->timestamps();
	        $table->foreign('device_service_id')->references('id')->on('device_services');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('inventory');
    }
}
