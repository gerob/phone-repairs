<?php

use Illuminate\Database\Seeder;

class DeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $devices = [
            ['manufacturer' => 'AppleSC', 'model' => 'Apple iPad 2', 'image' => 'apple-ipad-2.png', 'level' => NULL],
            ['manufacturer' => 'AppleSC', 'model' => 'Apple iPad 3', 'image' => 'apple-ipad-3.png', 'level' => NULL],
            ['manufacturer' => 'AppleSC', 'model' => 'Apple iPad 4', 'image' => 'apple-ipad-4.png', 'level' => NULL],
            ['manufacturer' => 'AppleSC', 'model' => 'Apple iPad Air 1', 'image' => 'apple-ipad-air-1.png', 'level' => NULL],
            ['manufacturer' => 'AppleSC', 'model' => 'Apple iPad Air 2', 'image' => 'apple-ipad-air-2.png', 'level' => NULL],
            ['manufacturer' => 'AppleSC', 'model' => 'Apple iPad Mini 1', 'image' => 'apple-ipad-mini-1.png', 'level' => NULL],
            ['manufacturer' => 'AppleSC', 'model' => 'Apple iPhone 5', 'image' => 'apple-iphone-5', 'level' => NULL],
            ['manufacturer' => 'AppleSC', 'model' => 'Apple iPhone 5S', 'image' => 'apple-iphone-5s', 'level' => NULL],
            ['manufacturer' => 'AppleSC', 'model' => 'Apple iPhone 5C', 'image' => 'apple-iphone-5c', 'level' => NULL],
            ['manufacturer' => 'AppleSC', 'model' => 'Apple iPhone 6', 'image' => 'apple-iphone-6', 'level' => NULL],
            ['manufacturer' => 'AppleSC', 'model' => 'Apple iPhone 6+', 'image' => 'apple-iphone-6-plus', 'level' => NULL],

            ['manufacturer' => 'SamsungSC', 'model' => 'Samsung Galaxy S4', 'image' => 'samsung-galaxy-s4', 'level' => NULL],
            ['manufacturer' => 'SamsungSC', 'model' => 'Samsung Galaxy S5', 'image' => 'samsung-galaxy-s5', 'level' => NULL],
            ['manufacturer' => 'SamsungSC', 'model' => 'Samsung Galaxy S6', 'image' => 'samsung-galaxy-s6', 'level' => NULL],
            ['manufacturer' => 'SamsungSC', 'model' => 'Samsung Galaxy S6 Edge', 'image' => 'samsung-galaxy-s6-edge', 'level' => NULL]
        ];

        \App\Device::insert($devices);
    }
}
