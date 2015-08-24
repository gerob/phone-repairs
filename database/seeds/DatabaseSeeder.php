<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(StoresSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(DeviceSeeder::class);
        $this->call(ServicesSeeder::class);
        $this->call(DeviceServicesSeeder::class);
        $this->call(WarrantiesSeeder::class);
        $this->call(InventorySeeder::class);

        Model::reguard();
    }
}
