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
            ['manufacturer' => 'AppleSC', 'model' => 'Apple iPad 2', 'level' => NULL],
            ['manufacturer' => 'AppleSC', 'model' => 'Apple iPad 3', 'level' => NULL],
            ['manufacturer' => 'AppleSC', 'model' => 'Apple iPad 4', 'level' => NULL],
            ['manufacturer' => 'AppleSC', 'model' => 'Apple iPad Air 1', 'level' => NULL],
            ['manufacturer' => 'AppleSC', 'model' => 'Apple iPad Air 2', 'level' => NULL],
            ['manufacturer' => 'AppleSC', 'model' => 'Apple iPad Mini 1', 'level' => NULL],
            ['manufacturer' => 'AppleSC', 'model' => 'Apple iPhone 5', 'level' => NULL],
            ['manufacturer' => 'AppleSC', 'model' => 'Apple iPhone 5S', 'level' => NULL],
            ['manufacturer' => 'AppleSC', 'model' => 'Apple iPhone 5C', 'level' => NULL],
            ['manufacturer' => 'AppleSC', 'model' => 'Apple iPhone 6', 'level' => NULL],
            ['manufacturer' => 'AppleSC', 'model' => 'Apple iPhone 6+', 'level' => NULL],

            ['manufacturer' => 'SamsungSC', 'model' => 'Samsung Galaxy S4', 'level' => NULL],
            ['manufacturer' => 'SamsungSC', 'model' => 'Samsung Galaxy S5', 'level' => NULL],
            ['manufacturer' => 'SamsungSC', 'model' => 'Samsung Galaxy S6', 'level' => NULL],
            ['manufacturer' => 'SamsungSC', 'model' => 'Samsung Galaxy S6 Edge', 'level' => NULL]
        ];

        \App\Device::insert($devices);
    }
}
