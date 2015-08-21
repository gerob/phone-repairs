<?php

use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            'Screen Replacement',
            'Battery Replacement',
            'Unlocking'
        ];

        foreach ($services as $service) {
            \App\Service::create([
                'name' => $service
            ]);
        }
    }
}
