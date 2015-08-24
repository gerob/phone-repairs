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

        foreach ($stores as $store) {
            foreach ($device_services as $ds) {
                $ds->inventory()->create([
                    'count'        => rand(17, 20),
                    'store_number' => $store->number,
                    'upc'          => $ds->upc
                ]);
            }
        }
    }
}
