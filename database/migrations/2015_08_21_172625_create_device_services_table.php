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
        $services = [
            'Screen Replacement',
            'Battery Replacement',
            'Unlocking'
        ];

        $devices = \App\Device::all();

        foreach ($devices as $device) {
            foreach ($services as $service) {
                \App\DeviceService::create([
                    'service' => $service,

                ]);
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
