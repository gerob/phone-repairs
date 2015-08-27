<?php

use Illuminate\Database\Seeder;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $devices = \App\Device::all()->toArray();
        $store = \App\Store::all()->toArray();
        $memberships = ['Trial Pass', 'Business', 'Plus', 'Savings'];
        $carriers = ['AT&T', 'Sprint', 'T-Mobile', 'Verizon', 'Other'];

        foreach (range(1, 30) as $value) {
            $details = [
                'first_name'    => $faker->firstName,
                'last_name'     => $faker->lastName,
                'email'         => $faker->safeEmail,
                'phone'         => $faker->phoneNumber,
                'address'       => $faker->streetAddress,
                'address2'      => null,
                'city'          => $faker->city,
                'state'         => $faker->state,
                'zip'           => $faker->postcode,
                'member_type'   => $memberships[array_rand($memberships)],
                'member_number' => rand(11111111, 22222222),
            ];
            $customer = \App\Customer::create($details);

            $device = $devices[array_rand($devices)];
            $order = $customer->orders()->create([
                'first_name'          => $details['first_name'],
                'last_name'           => $details['last_name'],
                'email'               => $details['email'],
                'phone'               => $details['phone'],
                'address'             => $details['address'],
                'address2'            => $details['address2'],
                'city'                => $details['city'],
                'state'               => $details['state'],
                'zip'                 => $details['zip'],
                'member_type'         => $details['member_type'],
                'member_number'       => $details['member_number'],

                'device_name'         => $device['model'],
                'color'               => $faker->colorName,
                'serial_number'       => rand(111111111111, 222222222222),
                'passcode'            => rand(1111, 2222),
                'carrier'             => $carriers[array_rand($carriers)],
                'claim_number'        => rand(11111, 22222),
                'description'         => $faker->text(),
                'store_number'        => $store[array_rand($store)]['number'],
                'technician_initials' => $faker->word,
                'confirmed'           => true
            ]);

            $services = \App\DeviceService::where('device_id', $device['id'])->with('dsService')->get();

            foreach ($services as $index => $service) {
                if (($index % 2) == 0) {
                    $order->coServices()->create([
                        'name' => $service->dsService->name,
                        'price' => $service->price,
                        'upc' => $service->upc
                    ]);
                }
            }

        }
    }
}
