<?php

use Illuminate\Database\Seeder;

class DeviceServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $devices = \App\Device::all();
        $services = \App\Service::all();

        foreach ($devices as $device) {
            foreach ($services as $service) {
                $device->services()->save($service, [
                    'price' => rand(7500, 20000),
                    'upc' => rand(11111111111, 22222222222)
                ]);
            }
        }
    }
}
