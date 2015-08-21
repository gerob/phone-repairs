<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id');

            $table->string('first_name', 64);
            $table->string('last_name', 64);
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->string('phone');

            $table->string('device_name');
            $table->string('store_number');
            $table->string('color');
            $table->string('serial_number');
            $table->string('carrier');
            $table->text('description');
            $table->string('member_type');
            $table->string('member_number');
            $table->string('claim');
            $table->string('claim_number');
            $table->string('warranty_years');
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
        Schema::drop('customer_invoices');
    }
}
