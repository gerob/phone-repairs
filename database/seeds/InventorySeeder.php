<?php

use Illuminate\Database\Seeder;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stores = \App\Store::all();

        $devices_and_services = \League\Csv\Reader::createFromPath(storage_path('app/imports/sams-new-services.csv'));
        $devices_and_services->setFlags(SplFileObject::READ_AHEAD|SplFileObject::SKIP_EMPTY);

        $serviceMap = [];
        foreach ($devices_and_services as $ds) {
            // Map UPC to count/threshold
            $serviceMap[$ds[3]] = $ds[1];
        }

        $device_services = \App\DeviceService::with('dsDevice', 'dsService')->get();

        foreach ($stores as $store) {
            foreach ($device_services as $ds) {
                $ds->inventory()->create([
                    'count'        => $serviceMap[$ds->upc],
                    'threshold'    => $serviceMap[$ds->upc],
                    'store_number' => $store->number,
                    'upc'          => $ds->upc
                ]);
            }
        }
    }
}
