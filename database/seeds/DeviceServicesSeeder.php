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
dd($service->id, $device->id);
                \App\DeviceService::create([
                    'device_id' => $device->id,
                    'service_id' => $service->id,
                    'price' => rand(7500, 20000),
                    'upc' => '00000000000000'
                ]);
            }
        }
    }
}
