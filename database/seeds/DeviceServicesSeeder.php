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
        $devices_and_services = \League\Csv\Reader::createFromPath(storage_path('imports/sams-new-services.csv'));
        $devices_and_services->setFlags(SplFileObject::READ_AHEAD|SplFileObject::SKIP_EMPTY);

        foreach ($devices_and_services as $index => $ds) {
            if ($index == 0) continue;
            $device = \App\Device::firstOrCreate([
                'manufacturer' => $ds[5],
                'model'        => $ds[4],
                'image'        => str_slug($ds[4]) . '.png',
                'level'        => null
            ]);

            $service = \App\Service::firstOrCreate([
                'name' => $ds[0]
            ]);

            $service->devices()->attach($device, ['price' => ($ds[2] * 100), 'upc' => $ds[3]]);
        }
    }
}
