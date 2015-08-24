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

        $device_services = \App\DeviceService::with('dsDevice', 'dsService')->get();

        foreach ($device_services as $ds) {
            foreach ($stores as $store) {

                $ds->inventory()->create([
                    'count'        => 0,
                    'store_number' => $store->number,
                    'device_name'  => $ds->dsDevice->model,
                    'service_name' => $ds->dsService->name,
                    'upc'          => $ds->upc
                ]);
            }
        }
    }
}
