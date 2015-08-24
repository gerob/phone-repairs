<?php

use Illuminate\Database\Seeder;

class StoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stores = [
            ['number' => 'SC4709'],
            ['number' => 'SC4735'],
            ['number' => 'SC6378'],
            ['number' => 'SC6610'],
            ['number' => 'SC6611'],
            ['number' => 'SC6615'],
            ['number' => 'SC6616'],
            ['number' => 'SC6619'],
            ['number' => 'SC6624'],
            ['number' => 'SC6627'],
        ];

        foreach ($stores as $store) {
            \App\Store::create($store);
        }
    }
}
